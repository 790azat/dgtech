const { chromium } = require('playwright');
(async () => {
  const b = await chromium.launch(); const p = await b.newPage({deviceScaleFactor: 6});
  await p.goto('file://' + process.cwd() + '/sheet.html'); await p.evaluate(() => document.fonts.ready);
  await p.pdf({ path: 'FlyOne_Armenia_stickers_A4.pdf', format: 'A4', printBackground: true, margin: {top:0,right:0,bottom:0,left:0} });
  await p.setViewportSize({ width: 794, height: 1123 });
  await p.screenshot({ path: 'preview_zoom.png', clip: { x: 0, y: 0, width: 260, height: 70 }, scale: 'device' });
  await b.close();
})();
