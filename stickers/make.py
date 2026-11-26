# A4 sheet of "FLYONE ARMENIA" decals for a 10 cm A320 model. Text outlined to vector paths.
from fontTools.ttLib import TTFont
from fontTools.pens.svgPathPen import SVGPathPen
from fontTools.pens.transformPen import TransformPen

W_TEXT = 38.0      # total text length, mm (~38% of a 10 cm fuselage, like the real livery)
CAP = 3.3          # cap height, mm
PAD_X, PAD_Y = 0.8, 0.7
GAP = 0.0   # stickers share cut lines
MARGIN = 3.5
PAGE_W, PAGE_H = 210.0, 297.0

font = TTFont("/usr/share/fonts/opentype/inter/Inter-ExtraBold.otf")
gs, cmap, hmtx = font.getGlyphSet(), font.getBestCmap(), font["hmtx"]
capu = font["OS/2"].sCapHeight

def word(text, x0, width, baseline):
    """Return list of (letter_path_d) scaled so the word is exactly `width` mm wide."""
    names = [cmap[ord(ch)] for ch in text]
    adv = sum(hmtx[n][0] for n in names)
    sx, sy = width / adv, CAP / capu
    out, x = [], 0
    for n in names:
        pen = SVGPathPen(gs)
        gs[n].draw(TransformPen(pen, (sx, 0, 0, -sy, x0 + x*sx, baseline)))
        out.append(pen.getCommands()); x += hmtx[n][0]
    return out

SW, SH = W_TEXT + 2*PAD_X, CAP + 2*PAD_Y
cols = int((PAGE_W - 2*MARGIN + GAP) // (SW + GAP))
rows = int((PAGE_H - 2*MARGIN + GAP) // (SH + GAP))
ox = (PAGE_W - (cols*SW + (cols-1)*GAP)) / 2
oy = (PAGE_H - (rows*SH + (rows-1)*GAP)) / 2
w1, w2 = W_TEXT*263/593, W_TEXT*298/593       # proportions measured on the real aircraft
top, base = PAD_Y, PAD_Y + CAP

blues = ["#22a7ea", "#1f8fe0", "#1f73d2", "#1f58bd", "#213fa6", "#23278f"]
fly = "".join(f'<path d="{d}" fill="{c}"/>' for d, c in zip(word("FLYONE", PAD_X, w1, base), blues))
arm_d = " ".join(word("ARMENIA", SW - PAD_X - w2, w2, base))
b = CAP/3
bands = [("#d90012", top-0.5, b+0.5+0.02), ("#0033a0", top+b, b+0.02), ("#f2a800", top+2*b, b+0.5)]
clips = "".join(f'<clipPath id="c{i}"><rect x="0" y="{y:.3f}" width="{SW}" height="{h:.3f}"/></clipPath>'
                for i, (_, y, h) in enumerate(bands))
arm = "".join(f'<path d="{arm_d}" fill="{c}" clip-path="url(#c{i})"/>' for i, (c, _, _) in enumerate(bands))
guide = f'<rect x="0" y="0" width="{SW}" height="{SH}" fill="none" stroke="#c8c8c8" stroke-width="0.08" stroke-dasharray="0.6 0.6"/>'
defs = f'<defs>{clips}<g id="s">{guide}{fly}{arm}</g></defs>'
uses = "\n".join(f'<use href="#s" x="{ox+c*(SW+GAP):.3f}" y="{oy+r*(SH+GAP):.3f}"/>'
                 for r in range(rows) for c in range(cols))
svg = f'<svg xmlns="http://www.w3.org/2000/svg" width="210mm" height="297mm" viewBox="0 0 210 297">{defs}{uses}</svg>'
open("sheet.svg", "w").write(svg)
open("sheet.html","w").write(f'<!doctype html><meta charset="utf-8"><style>@page{{size:A4;margin:0}}html,body{{margin:0}}svg{{display:block}}</style>{svg}')
print(cols, rows, cols*rows, f"sticker {SW:.1f}x{SH:.1f} mm")
