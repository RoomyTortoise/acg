function switchToEn() {
    document.querySelector('script[src="nav_es.js"]').remove();
    const script = document.createElement('script');
    script.src = 'nav_en.js';
    document.head.appendChild(script);
  }
  
  function switchToEs() {
    document.querySelector('script[src="nav_en.js"]').remove();
    const script = document.createElement('script');
    script.src = 'nav_es.js';
    document.head.appendChild(script);
  }
  