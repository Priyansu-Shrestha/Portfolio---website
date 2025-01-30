// Theme Toggle
const themeToggle = document.querySelector('.theme-toggle');
themeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme');
    localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light');
    themeToggle.innerHTML = document.body.classList.contains('dark-theme') ? 
        '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
});

// Mobile Menu
const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');

menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    menuToggle.classList.toggle('active');
});

// Dynamic Project Loading
const projects = [
    {
        title: "E-Commerce Platform",
        description: "Full-stack shopping platform with React & Node.js",
        tech: ["React", "Node.js", "MongoDB"]
    },
    {
        title: "Portfolio Builder",
        description: "AI-powered portfolio generator",
        tech: ["Next.js", "Python", "AI"]
    }
];

function loadProjects() {
    const grid = document.querySelector('.projects-grid');
    projects.forEach(project => {
        const card = document.createElement('div');
        card.className = 'project-card';
        card.innerHTML = `
            <h3>${project.title}</h3>
            <p>${project.description}</p>
            <div class="tech-stack">
                ${project.tech.map(t => `<span>${t}</span>`).join('')}
            </div>
        `;
        grid.appendChild(card);
    });
}

// Form Validation
document.querySelector('.contact-form').addEventListener('submit', (e) => {
    e.preventDefault();
    // Add form submission logic
    alert('Message sent successfully!');
    e.target.reset();
});

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    loadProjects();
    
    // Set initial theme
    const savedTheme = localStorage.getItem('theme') || 'dark';
    document.body.classList.toggle('dark-theme', savedTheme === 'dark');
    themeToggle.innerHTML = savedTheme === 'dark' ? 
        '<i class="fas fa-moon"></i>' : '<i class="fas fa-sun"></i>';
});

// Scroll Reveal Animation
const scrollReveal = ScrollReveal({
    distance: '50px',
    duration: 1000,
    reset: true
});

scrollReveal.reveal('.hero-content, .section-title, .skill-card, .project-card', {
    origin: 'bottom',
    interval: 200
});