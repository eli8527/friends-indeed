window.onload = () => {
  // Check sticky header
  const observer = new IntersectionObserver(
    ([e]) => e.target.toggleAttribute('stuck', e.intersectionRatio < 1),
    {threshold: [1]}
  );
  observer.observe(document.getElementById('header'));

  // Run time
  let setTime = () => {
    let currentTimeEl = document.getElementById('current-time');
    let now = new Date();
    let ampm = now.toLocaleTimeString().split(' ')[1];
    let nowParts = now.toLocaleTimeString().split(':');
    currentTimeEl.innerHTML = `${nowParts[0]}:${nowParts[1]} ${ampm}`;
  }

  setTime();
  setInterval(setTime, 1000);
}
