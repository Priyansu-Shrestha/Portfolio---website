// ============================================================
// Priyansu Shrestha — Portfolio interactions
// ============================================================

document.addEventListener('DOMContentLoaded', () => {

  /* ---- Mobile nav toggle ---- */
  const navToggle = document.getElementById('navToggle');
  const navLinks = document.getElementById('navLinks');
  if (navToggle && navLinks) {
    navToggle.addEventListener('click', () => {
      navLinks.classList.toggle('open');
    });
    navLinks.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => navLinks.classList.remove('open'));
    });
  }

  /* ---- Typing role line on the hero ---- */
  const typingEl = document.getElementById('typing');
  if (typingEl) {
    const roles = [
      'Full Stack Developer',
      'PHP & MySQL Developer',
      'BSc (Hons) IT Student',
      'Former Civil Engineering Student'
    ];
    let roleIndex = 0, charIndex = 0, deleting = false;

    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function tick() {
      const current = roles[roleIndex];
      if (!deleting) {
        charIndex++;
        typingEl.textContent = current.slice(0, charIndex);
        if (charIndex === current.length) {
          deleting = true;
          setTimeout(tick, 1400);
          return;
        }
      } else {
        charIndex--;
        typingEl.textContent = current.slice(0, charIndex);
        if (charIndex === 0) {
          deleting = false;
          roleIndex = (roleIndex + 1) % roles.length;
        }
      }
      setTimeout(tick, deleting ? 35 : 65);
    }

    if (prefersReduced) {
      typingEl.textContent = roles[0];
    } else {
      tick();
    }
  }

  /* ---- Scroll reveal for sheet sections ---- */
  const revealTargets = document.querySelectorAll('.project-card, .skill-group, .about-content, .rev-table tr');
  if ('IntersectionObserver' in window && revealTargets.length) {
    revealTargets.forEach(el => {
      el.style.opacity = 0;
      el.style.transform = 'translateY(14px)';
      el.style.transition = 'opacity .5s ease, transform .5s ease';
    });
    const io = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = 1;
          entry.target.style.transform = 'translateY(0)';
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    revealTargets.forEach(el => io.observe(el));
  }

});
