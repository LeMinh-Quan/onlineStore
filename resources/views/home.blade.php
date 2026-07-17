<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vựa — Cửa hàng trực tuyến</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,400;1,9..144,500&family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  :root{
    --cream:#F7F3ED;
    --paper:#FBF8F3;
    --ink:#1C2B23;
    --lacquer:#B5482F;
    --lacquer-deep:#8F3722;
    --tea:#4A6B54;
    --tea-pale:#DDE6DF;
    --brass:#C9A15C;
    --white:#FFFFFF;
    --line:rgba(28,43,35,0.12);

    --display: 'Fraunces', serif;
    --body: 'Be Vietnam Pro', sans-serif;
    --mono: 'JetBrains Mono', monospace;

    --wrap: 1240px;
  }

  *{box-sizing:border-box;}
  html{scroll-behavior:smooth;}
  body{
    margin:0;
    background:var(--cream);
    color:var(--ink);
    font-family:var(--body);
    -webkit-font-smoothing:antialiased;
    overflow-x:hidden;
  }
  img{max-width:100%;display:block;}
  a{color:inherit;text-decoration:none;}
  button{font-family:inherit;cursor:pointer;}
  ul{margin:0;padding:0;list-style:none;}

  :focus-visible{
    outline:2px solid var(--lacquer);
    outline-offset:3px;
    border-radius:2px;
  }

  @media (prefers-reduced-motion: reduce){
    *{animation-duration:0.01ms !important; animation-iteration-count:1 !important; transition-duration:0.01ms !important; scroll-behavior:auto !important;}
  }

  .wrap{
    max-width:var(--wrap);
    margin:0 auto;
    padding:0 32px;
  }

  /* ---------- Announcement bar ---------- */
  .announce{
    background:var(--ink);
    color:var(--paper);
    font-family:var(--mono);
    font-size:12.5px;
    letter-spacing:0.04em;
    text-align:center;
    padding:9px 16px;
  }
  .announce b{color:var(--brass); font-weight:500;}

  /* ---------- Header ---------- */
  header{
    position:sticky;
    top:0;
    z-index:100;
    background:rgba(247,243,237,0.88);
    backdrop-filter:blur(10px);
    -webkit-backdrop-filter:blur(10px);
    border-bottom:1px solid var(--line);
  }
  .nav{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:18px 32px;
    max-width:var(--wrap);
    margin:0 auto;
    gap:24px;
  }
  .logo{
    font-family:var(--display);
    font-weight:600;
    font-size:26px;
    letter-spacing:0.01em;
    display:flex;
    align-items:baseline;
    gap:8px;
    flex-shrink:0;
  }
  .logo em{
    font-style:italic;
    color:var(--lacquer);
    font-weight:400;
  }
  .nav-links{
    display:flex;
    gap:34px;
    font-size:15px;
    font-weight:500;
  }
  .nav-links a{
    position:relative;
    padding:6px 0;
    color:var(--ink);
    opacity:0.75;
    transition:opacity 0.2s;
  }
  .nav-links a:hover{opacity:1;}
  .nav-links a::after{
    content:'';
    position:absolute;
    left:0; bottom:0;
    width:0; height:1.5px;
    background:var(--lacquer);
    transition:width 0.25s ease;
  }
  .nav-links a:hover::after{width:100%;}

  .nav-actions{
    display:flex;
    align-items:center;
    gap:18px;
    flex-shrink:0;
  }
  .icon-btn{
    width:38px; height:38px;
    display:flex;align-items:center;justify-content:center;
    border-radius:50%;
    border:1px solid var(--line);
    background:transparent;
    transition:border-color 0.2s, background 0.2s;
    position:relative;
  }
  .icon-btn:hover{border-color:var(--ink); background:var(--white);}
  .icon-btn svg{width:17px;height:17px;stroke:var(--ink); fill:none;}
  .cart-count{
    position:absolute;
    top:-4px; right:-4px;
    background:var(--lacquer);
    color:var(--paper);
    font-size:10px;
    font-family:var(--mono);
    width:16px;height:16px;
    border-radius:50%;
    display:flex;align-items:center;justify-content:center;
  }

  /* ---------- Hero ---------- */
  .hero{
    position:relative;
    padding:78px 32px 0;
    max-width:var(--wrap);
    margin:0 auto;
    display:grid;
    grid-template-columns:1.05fr 0.95fr;
    gap:56px;
    align-items:center;
  }
  .hero-eyebrow{
    font-family:var(--mono);
    font-size:12.5px;
    letter-spacing:0.12em;
    text-transform:uppercase;
    color:var(--tea);
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:22px;
  }
  .hero-eyebrow::before{
    content:'';
    width:26px;height:1px;
    background:var(--tea);
  }
  .hero h1{
    font-family:var(--display);
    font-weight:600;
    font-size:clamp(40px, 5.2vw, 68px);
    line-height:1.03;
    margin:0 0 24px;
    letter-spacing:-0.01em;
  }
  .hero h1 .accent{
    font-style:italic;
    font-weight:400;
    color:var(--lacquer);
  }
  .hero p{
    font-size:17.5px;
    line-height:1.65;
    color:rgba(28,43,35,0.78);
    max-width:460px;
    margin:0 0 36px;
  }
  .hero-ctas{
    display:flex;
    gap:16px;
    align-items:center;
    flex-wrap:wrap;
    margin-bottom:44px;
  }
  .btn-primary{
    background:var(--ink);
    color:var(--paper);
    border:1px solid var(--ink);
    padding:15px 30px;
    border-radius:100px;
    font-weight:600;
    font-size:15px;
    letter-spacing:0.01em;
    transition:background 0.2s, transform 0.15s, color .2s;
    display:inline-flex;
    align-items:center;
    gap:9px;
  }
  .btn-primary:hover{background:var(--lacquer); border-color:var(--lacquer); transform:translateY(-1px);}
  .btn-secondary{
    background:transparent;
    color:var(--ink);
    border:1px solid var(--line);
    padding:15px 26px;
    border-radius:100px;
    font-weight:600;
    font-size:15px;
    transition:border-color 0.2s, background 0.2s;
  }
  .btn-secondary:hover{border-color:var(--ink); background:var(--white);}

  .hero-stats{
    display:flex;
    gap:36px;
    padding-top:30px;
    border-top:1px solid var(--line);
  }
  .hero-stats div strong{
    display:block;
    font-family:var(--display);
    font-size:26px;
    font-weight:600;
  }
  .hero-stats div span{
    font-size:12.5px;
    color:rgba(28,43,35,0.6);
  }

  /* --- Signature: phin coffee filter drip animation --- */
  .hero-visual{
    position:relative;
    display:flex;
    justify-content:center;
    align-items:flex-start;
    padding-top:10px;
  }
  .phin-card{
    background:var(--white);
    border-radius:28px;
    padding:44px 40px 36px;
    box-shadow:0 30px 70px -30px rgba(28,43,35,0.28);
    position:relative;
    width:100%;
    max-width:420px;
    border:1px solid var(--line);
  }
  .phin-card .tag{
    position:absolute;
    top:26px; right:26px;
    background:var(--tea-pale);
    color:var(--tea);
    font-family:var(--mono);
    font-size:11px;
    padding:5px 11px;
    border-radius:100px;
    letter-spacing:0.04em;
  }
  .phin-svg{width:100%;height:auto;}
  .drop{
    animation:fall 2.2s cubic-bezier(.55,0,.85,.35) infinite;
    transform-origin:center;
  }
  .drop:nth-child(2){animation-delay:0.7s;}
  .drop:nth-child(3){animation-delay:1.4s;}
  @keyframes fall{
    0%{transform:translateY(0) scale(1); opacity:0;}
    8%{opacity:1;}
    72%{opacity:1;}
    100%{transform:translateY(64px) scale(0.4); opacity:0;}
  }
  .ripple{
    animation:ripple 2.2s ease-out infinite;
    transform-origin:center;
  }
  @keyframes ripple{
    0%,60%{opacity:0; transform:scale(0.3);}
    68%{opacity:0.5;}
    100%{opacity:0; transform:scale(1.5);}
  }
  .phin-caption{
    text-align:center;
    margin-top:18px;
    font-size:13.5px;
    color:rgba(28,43,35,0.55);
    line-height:1.5;
  }
  .phin-caption strong{color:var(--ink); font-weight:600;}
  .phin-price{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:22px;
    padding-top:20px;
    border-top:1px dashed var(--line);
  }
  .phin-price .amount{
    font-family:var(--mono);
    font-size:20px;
    font-weight:500;
  }
  .phin-price .add{
    background:var(--ink);
    color:var(--paper);
    border:none;
    padding:10px 20px;
    border-radius:100px;
    font-size:13.5px;
    font-weight:600;
    transition:background 0.2s;
  }
  .phin-price .add:hover{background:var(--lacquer);}

  .float-card{
    position:absolute;
    background:var(--white);
    border-radius:16px;
    padding:12px 16px;
    box-shadow:0 20px 40px -20px rgba(28,43,35,0.3);
    font-size:12.5px;
    display:flex;
    align-items:center;
    gap:10px;
    border:1px solid var(--line);
    z-index:2;
  }
  .float-card.stars{
    top:-6px; left:-18px;
    font-family:var(--mono);
  }
  .float-card.stars .star-icons{color:var(--brass); font-size:13px; letter-spacing:1px;}

  /* ---------- Marquee strip ---------- */
  .marquee-strip{
    background:var(--ink);
    color:var(--paper);
    overflow:hidden;
    padding:16px 0;
    margin-top:88px;
    white-space:nowrap;
  }
  .marquee-track{
    display:inline-flex;
    animation:scroll-left 32s linear infinite;
  }
  .marquee-strip:hover .marquee-track{animation-play-state:paused;}
  @keyframes scroll-left{
    from{transform:translateX(0);}
    to{transform:translateX(-50%);}
  }
  .marquee-track span{
    font-family:var(--display);
    font-style:italic;
    font-size:19px;
    padding:0 32px;
    display:inline-flex;
    align-items:center;
    gap:32px;
    color:var(--paper);
    opacity:0.9;
  }
  .marquee-track span::after{
    content:'✦';
    font-style:normal;
    color:var(--brass);
    font-size:13px;
  }

  /* ---------- Section shell ---------- */
  section{padding:104px 32px;}
  .section-head{
    display:flex;
    justify-content:space-between;
    align-items:flex-end;
    gap:32px;
    margin-bottom:52px;
    max-width:var(--wrap);
    margin-left:auto;
    margin-right:auto;
  }
  .section-eyebrow{
    font-family:var(--mono);
    font-size:12px;
    letter-spacing:0.1em;
    text-transform:uppercase;
    color:var(--lacquer);
    margin-bottom:14px;
    display:block;
  }
  .section-head h2{
    font-family:var(--display);
    font-size:clamp(30px,3.4vw,44px);
    font-weight:600;
    margin:0;
    letter-spacing:-0.01em;
    line-height:1.1;
  }
  .section-head p{
    max-width:340px;
    font-size:15px;
    line-height:1.6;
    color:rgba(28,43,35,0.65);
    margin:0;
  }

  /* ---------- Categories ---------- */
  .cat-grid{
    max-width:var(--wrap);
    margin:0 auto;
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
  }
  .cat-card{
    background:var(--white);
    border-radius:20px;
    padding:28px 24px;
    border:1px solid var(--line);
    transition:transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s;
    position:relative;
    overflow:hidden;
    display:block;
  }
  .cat-card:hover{
    transform:translateY(-5px);
    box-shadow:0 24px 48px -24px rgba(28,43,35,0.22);
    border-color:transparent;
  }
  .cat-icon{
    width:52px;height:52px;
    border-radius:14px;
    background:var(--tea-pale);
    display:flex;align-items:center;justify-content:center;
    margin-bottom:20px;
    color:var(--tea);
  }
  .cat-icon svg{width:24px;height:24px;stroke:currentColor;fill:none;stroke-width:1.6;}
  .cat-card:nth-child(2) .cat-icon{background:#F3E4D8;color:var(--lacquer);}
  .cat-card:nth-child(3) .cat-icon{background:#F1E8D3;color:var(--brass);}
  .cat-card:nth-child(4) .cat-icon{background:var(--tea-pale);color:var(--tea);}
  .cat-card h3{
    font-family:var(--display);
    font-size:19px;
    font-weight:600;
    margin:0 0 8px;
  }
  .cat-card span.count{
    font-family:var(--mono);
    font-size:12.5px;
    color:rgba(28,43,35,0.5);
  }

  /* ---------- Products ---------- */
  .prod-grid{
    max-width:var(--wrap);
    margin:0 auto;
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:26px 22px;
  }
  .prod-card{
    background:var(--paper);
    border-radius:18px;
    overflow:hidden;
    border:1px solid var(--line);
    transition:transform 0.25s, box-shadow 0.25s;
  }
  .prod-card:hover{
    transform:translateY(-4px);
    box-shadow:0 26px 50px -28px rgba(28,43,35,0.25);
  }
  .prod-media{
    aspect-ratio:1/1;
    position:relative;
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden;
  }
  .prod-media svg{width:62%;height:62%;}
  .prod-badge{
    position:absolute;
    top:14px; left:14px;
    background:var(--lacquer);
    color:var(--paper);
    font-family:var(--mono);
    font-size:10.5px;
    padding:4px 10px;
    border-radius:100px;
    letter-spacing:0.03em;
  }
  .prod-wish{
    position:absolute;
    top:12px; right:12px;
    width:32px;height:32px;
    border-radius:50%;
    background:rgba(255,255,255,0.85);
    display:flex;align-items:center;justify-content:center;
    border:none;
    transition:background 0.2s;
  }
  .prod-wish:hover{background:var(--white);}
  .prod-wish svg{width:15px;height:15px;stroke:var(--ink);fill:none;}
  .prod-info{padding:18px 18px 20px;}
  .prod-cat{
    font-size:11.5px;
    font-family:var(--mono);
    color:var(--tea);
    text-transform:uppercase;
    letter-spacing:0.05em;
    margin-bottom:6px;
  }
  .prod-info h4{
    font-family:var(--display);
    font-size:17px;
    font-weight:600;
    margin:0 0 4px;
    line-height:1.3;
  }
  .prod-info .region{
    font-size:12.5px;
    color:rgba(28,43,35,0.55);
    margin-bottom:14px;
  }
  .prod-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
  }
  .prod-price{
    font-family:var(--mono);
    font-weight:500;
    font-size:16px;
  }
  .prod-price .old{
    text-decoration:line-through;
    color:rgba(28,43,35,0.4);
    font-size:12.5px;
    margin-right:6px;
    font-weight:400;
  }
  .prod-add{
    width:34px;height:34px;
    border-radius:50%;
    background:var(--ink);
    border:none;
    display:flex;align-items:center;justify-content:center;
    transition:background 0.2s, transform 0.2s;
  }
  .prod-add:hover{background:var(--lacquer); transform:rotate(90deg);}
  .prod-add svg{width:15px;height:15px;stroke:var(--paper);}

  /* ---------- Story split ---------- */
  .story{
    background:var(--ink);
    color:var(--paper);
    border-radius:32px;
    max-width:var(--wrap);
    margin:0 auto;
    padding:0;
    display:grid;
    grid-template-columns:1fr 1fr;
    overflow:hidden;
  }
  .story-copy{
    padding:72px 64px;
    display:flex;
    flex-direction:column;
    justify-content:center;
  }
  .story-copy .section-eyebrow{color:var(--brass);}
  .story-copy h2{
    font-family:var(--display);
    font-size:clamp(28px,3vw,38px);
    font-weight:500;
    line-height:1.22;
    margin:0 0 22px;
  }
  .story-copy h2 em{font-style:italic; color:var(--brass);}
  .story-copy p{
    font-size:15.5px;
    line-height:1.75;
    color:rgba(251,248,243,0.72);
    margin:0 0 32px;
    max-width:420px;
  }
  .story-list{display:flex; flex-direction:column; gap:16px; margin-bottom:36px;}
  .story-list li{
    display:flex;
    gap:14px;
    align-items:flex-start;
    font-size:14.5px;
    color:rgba(251,248,243,0.85);
  }
  .story-list svg{width:18px;height:18px;stroke:var(--brass);fill:none;flex-shrink:0;margin-top:2px;}
  .story-visual{
    position:relative;
    background:linear-gradient(155deg,#26392E,#1C2B23 60%);
    display:flex;
    align-items:center;
    justify-content:center;
    padding:40px;
    min-height:100%;
  }
  .story-visual svg{width:100%; max-width:340px; height:auto;}

  /* ---------- Testimonials ---------- */
  .testi-grid{
    max-width:var(--wrap);
    margin:0 auto;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:22px;
  }
  .testi-card{
    background:var(--white);
    border-radius:20px;
    padding:32px 28px;
    border:1px solid var(--line);
    display:flex;
    flex-direction:column;
    gap:20px;
  }
  .testi-stars{color:var(--brass); font-size:14px; letter-spacing:2px;}
  .testi-card p{
    font-family:var(--display);
    font-style:italic;
    font-size:16.5px;
    line-height:1.6;
    margin:0;
    color:var(--ink);
  }
  .testi-who{
    display:flex;
    align-items:center;
    gap:12px;
    padding-top:16px;
    border-top:1px solid var(--line);
  }
  .testi-avatar{
    width:38px;height:38px;
    border-radius:50%;
    display:flex;align-items:center;justify-content:center;
    font-family:var(--display);
    font-weight:600;
    font-size:14px;
    color:var(--paper);
    flex-shrink:0;
  }
  .testi-who strong{display:block; font-size:14px; font-weight:600;}
  .testi-who span{font-size:12.5px; color:rgba(28,43,35,0.55);}

  /* ---------- Newsletter ---------- */
  .newsletter{
    max-width:var(--wrap);
    margin:0 auto;
    background:var(--tea-pale);
    border-radius:28px;
    padding:64px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:40px;
  }
  .newsletter h2{
    font-family:var(--display);
    font-size:clamp(24px,2.6vw,32px);
    font-weight:600;
    margin:0 0 10px;
    max-width:380px;
    line-height:1.2;
  }
  .newsletter p{
    margin:0;
    font-size:14.5px;
    color:rgba(28,43,35,0.65);
    max-width:380px;
  }
  .newsletter-form{
    display:flex;
    gap:10px;
    flex-shrink:0;
  }
  .newsletter-form input{
    font-family:var(--body);
    padding:14px 18px;
    border-radius:100px;
    border:1px solid transparent;
    width:250px;
    font-size:14.5px;
    background:var(--white);
  }
  .newsletter-form input:focus{outline:none; border-color:var(--tea);}
  .newsletter-form button{
    background:var(--ink);
    color:var(--paper);
    border:none;
    padding:14px 26px;
    border-radius:100px;
    font-weight:600;
    font-size:14.5px;
    white-space:nowrap;
    transition:background 0.2s;
  }
  .newsletter-form button:hover{background:var(--lacquer);}

  /* ---------- Footer ---------- */
  footer{
    padding:80px 32px 32px;
    max-width:var(--wrap);
    margin:0 auto;
  }
  .footer-grid{
    display:grid;
    grid-template-columns:1.4fr 1fr 1fr 1fr;
    gap:40px;
    padding-bottom:56px;
    border-bottom:1px solid var(--line);
  }
  .footer-brand .logo{margin-bottom:16px;}
  .footer-brand p{
    font-size:14px;
    line-height:1.65;
    color:rgba(28,43,35,0.6);
    max-width:280px;
    margin:0 0 20px;
  }
  .footer-social{display:flex; gap:10px;}
  .footer-col h5{
    font-family:var(--mono);
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:0.08em;
    margin:0 0 20px;
    color:rgba(28,43,35,0.5);
  }
  .footer-col ul{display:flex; flex-direction:column; gap:13px;}
  .footer-col a{
    font-size:14.5px;
    color:rgba(28,43,35,0.75);
    transition:color 0.2s;
  }
  .footer-col a:hover{color:var(--lacquer);}
  .footer-bottom{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding-top:28px;
    font-size:13px;
    color:rgba(28,43,35,0.5);
    flex-wrap:wrap;
    gap:12px;
  }
  .footer-bottom .legal-links{display:flex; gap:22px;}

  /* ---------- Responsive ---------- */
  @media (max-width:1080px){
    .cat-grid, .prod-grid{grid-template-columns:repeat(2,1fr);}
    .hero{grid-template-columns:1fr;}
    .hero-visual{order:-1; max-width:440px; margin:0 auto;}
    .story{grid-template-columns:1fr;}
    .story-visual{padding:32px; min-height:260px;}
    .testi-grid{grid-template-columns:1fr;}
    .footer-grid{grid-template-columns:1fr 1fr;}
  }
  @media (max-width:760px){
    .hero{padding-left:20px; padding-right:20px;}
    .nav{padding-left:20px; padding-right:20px;}
    .nav-links{display:none;}
    section{padding:72px 20px;}
    .cat-grid,.prod-grid{grid-template-columns:1fr 1fr; gap:14px;}
    .section-head{flex-direction:column; align-items:flex-start; gap:14px;}
    .story-copy{padding:48px 28px;}
    .newsletter{flex-direction:column; align-items:flex-start; padding:40px 28px;}
    .newsletter-form{width:100%;}
    .newsletter-form input{width:100%; flex:1;}
    .footer-grid{grid-template-columns:1fr 1fr; gap:32px;}
    .hero-stats{gap:22px;}
    .float-card.stars{left:0;}
  }
  @media (max-width:480px){
    .cat-grid,.prod-grid{grid-template-columns:1fr;}
    .footer-grid{grid-template-columns:1fr;}
    .footer-bottom{flex-direction:column; align-items:flex-start;}
  }
</style>
</head>
<body>

<div class="announce">Miễn phí vận chuyển cho đơn từ <b>500.000₫</b> — Giao toàn quốc trong 24–72 giờ</div>

<header>
  <nav class="nav">
    <a href="/" class="logo">Vự<em>a</em></a>
    <ul class="nav-links">
      <li><a href="#danh-muc">Danh mục</a></li>
      <li><a href="#san-pham">Sản phẩm</a></li>
      <li><a href="#cau-chuyen">Câu chuyện</a></li>
      <li><a href="#danh-gia">Đánh giá</a></li>
    </ul>
    <div class="nav-actions">
      <button class="icon-btn" aria-label="Tìm kiếm">
        <svg viewBox="0 0 24 24" stroke-width="1.6"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      </button>
      <button class="icon-btn" aria-label="Tài khoản">
        <svg viewBox="0 0 24 24" stroke-width="1.6"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
      </button>
      <button class="icon-btn" aria-label="Giỏ hàng, 3 sản phẩm">
        <svg viewBox="0 0 24 24" stroke-width="1.6"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
        <span class="cart-count">3</span>
      </button>
    </div>
  </nav>
</header>

<main>
  <section class="hero" style="padding-top:78px;">
    <div class="hero-copy">
      <div class="hero-eyebrow">Chợ phiên đặc sản · Từ làng ra phố</div>
      <h1>Chào mừng đến với <span class="accent">Vựa</span> — nơi giữ hồn quê giữa lòng thành phố.</h1>
      <p>Chúng tôi tuyển chọn cà phê, gốm, lụa và sơn mài trực tiếp từ các làng nghề khắp Việt Nam — mỗi món hàng đều có tên người làm ra nó.</p>
      <div class="hero-ctas">
        <a href="#san-pham" class="btn-primary">
          Khám phá sản phẩm
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
        <a href="#cau-chuyen" class="btn-secondary">Câu chuyện của Vựa</a>
      </div>
      <div class="hero-stats">
        <div><strong>128</strong><span>Làng nghề hợp tác</span></div>
        <div><strong>4.9★</strong><span>18.400 đánh giá</span></div>
        <div><strong>72h</strong><span>Giao hàng toàn quốc</span></div>
      </div>
    </div>

    <div class="hero-visual">
      <div class="float-card stars">
        <span class="star-icons">★★★★★</span>
        <span>"Cà phê đúng vị quê"</span>
      </div>
      <div class="phin-card">
        <span class="tag">Đang pha</span>
        <svg class="phin-svg" viewBox="0 0 300 260" fill="none" xmlns="http://www.w3.org/2000/svg">
          <ellipse class="ripple" cx="150" cy="230" rx="50" ry="8" fill="#B5482F" opacity="0.15"/>
          <ellipse cx="150" cy="230" rx="46" ry="7" fill="#3A2A20"/>
          <rect x="118" y="150" width="64" height="76" rx="4" fill="#F1EAE0" stroke="#C9A15C" stroke-width="2"/>
          <path d="M104 150 L196 150 L182 96 L118 96 Z" fill="#E9E0D2" stroke="#C9A15C" stroke-width="2"/>
          <ellipse cx="150" cy="96" rx="32" ry="7" fill="#DCD0BC" stroke="#C9A15C" stroke-width="2"/>
          <circle cx="140" cy="96" r="1.6" fill="#8a7a5c"/><circle cx="150" cy="96" r="1.6" fill="#8a7a5c"/><circle cx="160" cy="96" r="1.6" fill="#8a7a5c"/>
          <circle cx="145" cy="90" r="1.6" fill="#8a7a5c"/><circle cx="155" cy="90" r="1.6" fill="#8a7a5c"/>
          <rect x="128" y="80" width="44" height="12" rx="2" fill="#DCD0BC" stroke="#C9A15C" stroke-width="2"/>
          <circle class="drop" cx="150" cy="160" r="4" fill="#6B4226"/>
          <circle class="drop" cx="150" cy="160" r="4" fill="#6B4226"/>
          <circle class="drop" cx="150" cy="160" r="4" fill="#6B4226"/>
        </svg>
        <p class="phin-caption">Phin nhôm <strong>Đường Lâm</strong> — thủ công, dày dặn, pha đúng chuẩn cà phê phin truyền thống.</p>
        <div class="phin-price">
          <span class="amount">185.000₫</span>
          <button class="add">Thêm vào giỏ</button>
        </div>
      </div>
    </div>
  </section>

  <div class="marquee-strip" aria-hidden="true">
    <div class="marquee-track">
      <span>Cà phê Buôn Ma Thuột</span><span>Gốm Bát Tràng</span><span>Lụa Vạn Phúc</span><span>Sơn mài Hạ Thái</span><span>Trà Thái Nguyên</span><span>Mây tre Phú Vinh</span>
      <span>Cà phê Buôn Ma Thuột</span><span>Gốm Bát Tràng</span><span>Lụa Vạn Phúc</span><span>Sơn mài Hạ Thái</span><span>Trà Thái Nguyên</span><span>Mây tre Phú Vinh</span>
    </div>
  </div>

  <section id="danh-muc">
    <div class="section-head">
      <div>
        <span class="section-eyebrow">Danh mục</span>
        <h2>Bốn chất liệu, một tinh thần</h2>
      </div>
      <p>Mỗi danh mục là một vùng đất — chọn theo chất liệu bạn muốn mang về nhà.</p>
    </div>
    <div class="cat-grid">
      <a href="#san-pham" class="cat-card">
        <div class="cat-icon"><svg viewBox="0 0 24 24" stroke-width="1.6"><path d="M17 8h1a4 4 0 1 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/><line x1="6" y1="2" x2="6" y2="4"/><line x1="10" y1="2" x2="10" y2="4"/><line x1="14" y1="2" x2="14" y2="4"/></svg></div>
        <h3>Cà phê</h3>
        <span class="count">32 sản phẩm</span>
      </a>
      <a href="#san-pham" class="cat-card">
        <div class="cat-icon"><svg viewBox="0 0 24 24" stroke-width="1.6"><path d="M12 2C9 6 7 9 7 13a5 5 0 0 0 10 0c0-4-2-7-5-11Z"/></svg></div>
        <h3>Gốm sứ</h3>
        <span class="count">54 sản phẩm</span>
      </a>
      <a href="#san-pham" class="cat-card">
        <div class="cat-icon"><svg viewBox="0 0 24 24" stroke-width="1.6"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 9h18M8 5v4M16 5v4"/></svg></div>
        <h3>Lụa &amp; dệt</h3>
        <span class="count">41 sản phẩm</span>
      </a>
      <a href="#san-pham" class="cat-card">
        <div class="cat-icon"><svg viewBox="0 0 24 24" stroke-width="1.6"><path d="M4 19V5a2 2 0 0 1 2-2h9l5 5v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2Z"/><path d="M13 3v5h5"/></svg></div>
        <h3>Sơn mài</h3>
        <span class="count">23 sản phẩm</span>
      </a>
    </div>
  </section>

  <section id="san-pham">
    <div class="section-head">
      <div>
        <span class="section-eyebrow">Được yêu thích</span>
        <h2>Sản phẩm bán chạy tuần này</h2>
      </div>
      <p>Chọn lọc từ phản hồi thực tế của hơn 18.000 khách hàng trên toàn quốc.</p>
    </div>
    <div class="prod-grid">

      <div class="prod-card">
        <div class="prod-media" style="background:#EFE3D6;">
          <span class="prod-badge">Bán chạy</span>
          <button class="prod-wish" aria-label="Yêu thích"><svg viewBox="0 0 24 24" stroke-width="1.6"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"/></svg></button>
          <svg viewBox="0 0 200 200"><circle cx="100" cy="120" r="55" fill="#B5482F"/><rect x="70" y="55" width="60" height="40" rx="6" fill="#8F3722"/><ellipse cx="100" cy="55" rx="30" ry="8" fill="#6b291a"/></svg>
        </div>
        <div class="prod-info">
          <div class="prod-cat">Cà phê</div>
          <h4>Cà phê Robusta rang mộc</h4>
          <div class="region">Buôn Ma Thuột, Đắk Lắk</div>
          <div class="prod-footer">
            <div class="prod-price"><span class="old">145.000₫</span>119.000₫</div>
            <button class="prod-add" aria-label="Thêm vào giỏ"><svg viewBox="0 0 24 24" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></button>
          </div>
        </div>
      </div>

      <div class="prod-card">
        <div class="prod-media" style="background:#E4E9E5;">
          <button class="prod-wish" aria-label="Yêu thích"><svg viewBox="0 0 24 24" stroke-width="1.6"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"/></svg></button>
          <svg viewBox="0 0 200 200"><path d="M60 150 Q60 80 100 60 Q140 80 140 150 Z" fill="#4A6B54"/><ellipse cx="100" cy="150" rx="40" ry="10" fill="#3a5642"/></svg>
        </div>
        <div class="prod-info">
          <div class="prod-cat">Gốm sứ</div>
          <h4>Bình gốm men rạn cổ</h4>
          <div class="region">Bát Tràng, Hà Nội</div>
          <div class="prod-footer">
            <div class="prod-price">340.000₫</div>
            <button class="prod-add" aria-label="Thêm vào giỏ"><svg viewBox="0 0 24 24" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></button>
          </div>
        </div>
      </div>

      <div class="prod-card">
        <div class="prod-media" style="background:#F1E8D3;">
          <span class="prod-badge">Mới</span>
          <button class="prod-wish" aria-label="Yêu thích"><svg viewBox="0 0 24 24" stroke-width="1.6"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"/></svg></button>
          <svg viewBox="0 0 200 200"><rect x="50" y="70" width="100" height="70" rx="4" fill="#C9A15C"/><rect x="50" y="70" width="100" height="70" rx="4" fill="none" stroke="#8F3722" stroke-width="3"/><line x1="50" y1="105" x2="150" y2="105" stroke="#8F3722" stroke-width="2"/></svg>
        </div>
        <div class="prod-info">
          <div class="prod-cat">Lụa &amp; dệt</div>
          <h4>Khăn lụa tơ tằm hoa văn</h4>
          <div class="region">Vạn Phúc, Hà Đông</div>
          <div class="prod-footer">
            <div class="prod-price">265.000₫</div>
            <button class="prod-add" aria-label="Thêm vào giỏ"><svg viewBox="0 0 24 24" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></button>
          </div>
        </div>
      </div>

      <div class="prod-card">
        <div class="prod-media" style="background:#F3E4D8;">
          <button class="prod-wish" aria-label="Yêu thích"><svg viewBox="0 0 24 24" stroke-width="1.6"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"/></svg></button>
          <svg viewBox="0 0 200 200"><rect x="55" y="60" width="90" height="60" rx="3" fill="#3A2A20"/><rect x="60" y="65" width="80" height="50" rx="2" fill="#B5482F" opacity="0.85"/><path d="M70 100 Q100 80 130 100" stroke="#C9A15C" stroke-width="2" fill="none"/></svg>
        </div>
        <div class="prod-info">
          <div class="prod-cat">Sơn mài</div>
          <h4>Hộp trang sức sơn mài</h4>
          <div class="region">Hạ Thái, Hà Nội</div>
          <div class="prod-footer">
            <div class="prod-price">420.000₫</div>
            <button class="prod-add" aria-label="Thêm vào giỏ"><svg viewBox="0 0 24 24" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></button>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section id="cau-chuyen" style="padding-top:0;">
    <div class="story">
      <div class="story-copy">
        <span class="section-eyebrow">Câu chuyện của Vựa</span>
        <h2>Chúng tôi không bán hàng hoá. Chúng tôi <em>giới thiệu</em> người làm ra chúng.</h2>
        <p>Vựa bắt đầu từ một câu hỏi đơn giản: vì sao đặc sản làng nghề luôn rẻ ở nơi làm ra nhưng đắt đỏ và khó tìm ở thành phố? Chúng tôi làm việc trực tiếp với nghệ nhân, trả giá công bằng, và kể câu chuyện phía sau từng sản phẩm.</p>
        <ul class="story-list">
          <li><svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Mua trực tiếp từ 128 làng nghề, không qua trung gian</li>
          <li><svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Mỗi đơn hàng kèm câu chuyện và tên nghệ nhân</li>
          <li><svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> 5% doanh thu quay lại quỹ phát triển làng nghề</li>
        </ul>
        <a href="#" class="btn-secondary" style="background:transparent; border-color:rgba(251,248,243,0.25); color:var(--paper); width:fit-content;">Đọc toàn bộ câu chuyện</a>
      </div>
      <div class="story-visual">
        <svg viewBox="0 0 320 320" fill="none">
          <circle cx="160" cy="160" r="120" stroke="#C9A15C" stroke-width="1" opacity="0.4"/>
          <circle cx="160" cy="160" r="90" stroke="#C9A15C" stroke-width="1" opacity="0.25"/>
          <path d="M100 210 Q160 150 220 210" stroke="#B5482F" stroke-width="2.5" fill="none"/>
          <circle cx="100" cy="210" r="6" fill="#B5482F"/>
          <circle cx="220" cy="210" r="6" fill="#B5482F"/>
          <path d="M120 130 Q160 90 200 130" stroke="#4A6B54" stroke-width="2.5" fill="none"/>
          <circle cx="120" cy="130" r="5" fill="#4A6B54"/>
          <circle cx="200" cy="130" r="5" fill="#4A6B54"/>
          <text x="160" y="170" text-anchor="middle" fill="#F7F3ED" font-family="Fraunces, serif" font-style="italic" font-size="15" opacity="0.85">128 làng nghề</text>
          <text x="160" y="190" text-anchor="middle" fill="#C9A15C" font-family="JetBrains Mono, monospace" font-size="11" opacity="0.8">một mạng lưới</text>
        </svg>
      </div>
    </div>
  </section>

  <section id="danh-gia">
    <div class="section-head">
      <div>
        <span class="section-eyebrow">Khách hàng nói gì</span>
        <h2>Được tin dùng khắp ba miền</h2>
      </div>
    </div>
    <div class="testi-grid">
      <div class="testi-card">
        <span class="testi-stars">★★★★★</span>
        <p>"Cà phê đúng vị Ban Mê, đóng gói cẩn thận, kèm tấm thiệp nhỏ giới thiệu về người rang. Cảm động hơn cả mong đợi."</p>
        <div class="testi-who">
          <div class="testi-avatar" style="background:var(--lacquer);">H</div>
          <div><strong>Hồng Nhung</strong><span>TP. Hồ Chí Minh</span></div>
        </div>
      </div>
      <div class="testi-card">
        <span class="testi-stars">★★★★★</span>
        <p>"Mua bình gốm Bát Tràng làm quà cho mẹ, chất lượng vượt xa giá tiền. Giao hàng nhanh hơn dự kiến 1 ngày."</p>
        <div class="testi-who">
          <div class="testi-avatar" style="background:var(--tea);">T</div>
          <div><strong>Trần Minh Tuấn</strong><span>Đà Nẵng</span></div>
        </div>
      </div>
      <div class="testi-card">
        <span class="testi-stars">★★★★★</span>
        <p>"Khăn lụa Vạn Phúc mềm mịn, màu lên đẹp ngoài đời hơn cả ảnh. Sẽ quay lại mua thêm cho dịp Tết."</p>
        <div class="testi-who">
          <div class="testi-avatar" style="background:var(--brass);">L</div>
          <div><strong>Lê Thị Kim Anh</strong><span>Hà Nội</span></div>
        </div>
      </div>
    </div>
  </section>

  <section style="padding-top:0;">
    <div class="newsletter">
      <div>
        <h2>Nhận ưu đãi và câu chuyện làng nghề mới mỗi tuần</h2>
        <p>Không spam — chỉ những gì đáng đọc, gửi mỗi thứ Sáu.</p>
      </div>
      <form class="newsletter-form" onsubmit="event.preventDefault(); this.querySelector('button').textContent='Đã đăng ký ✓';">
        <input type="email" placeholder="Email của bạn" aria-label="Email" required>
        <button type="submit">Đăng ký</button>
      </form>
    </div>
  </section>
</main>

<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <div class="logo">Vự<em>a</em></div>
      <p>Đặc sản làng nghề Việt Nam, tuyển chọn và giao đến tận cửa nhà bạn trên toàn quốc.</p>
      <div class="footer-social">
        <a href="#" class="icon-btn" aria-label="Facebook"><svg viewBox="0 0 24 24" stroke-width="1.6"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3Z"/></svg></a>
        <a href="#" class="icon-btn" aria-label="Instagram"><svg viewBox="0 0 24 24" stroke-width="1.6"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
        <a href="#" class="icon-btn" aria-label="Zalo"><svg viewBox="0 0 24 24" stroke-width="1.6"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5Z"/></svg></a>
      </div>
    </div>
    <div class="footer-col">
      <h5>Mua sắm</h5>
      <ul>
        <li><a href="#danh-muc">Danh mục</a></li>
        <li><a href="#san-pham">Sản phẩm mới</a></li>
        <li><a href="#">Ưu đãi</a></li>
        <li><a href="#">Thẻ quà tặng</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h5>Hỗ trợ</h5>
      <ul>
        <li><a href="#">Vận chuyển</a></li>
        <li><a href="#">Đổi trả</a></li>
        <li><a href="#">Câu hỏi thường gặp</a></li>
        <li><a href="#">Liên hệ</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h5>Về Vựa</h5>
      <ul>
        <li><a href="#cau-chuyen">Câu chuyện</a></li>
        <li><a href="#">Làng nghề đối tác</a></li>
        <li><a href="#">Tuyển dụng</a></li>
        <li><a href="#">Báo chí</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2026 Vựa. Đã đăng ký bản quyền.</span>
    <div class="legal-links">
      <a href="#">Điều khoản</a>
      <a href="#">Bảo mật</a>
      <a href="#">Cookie</a>
    </div>
  </div>
</footer>

</body>
</html>