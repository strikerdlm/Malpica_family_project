<?php include 'header.php'; ?>

<main class="main-container">
  <div class="stars"></div>
  
  <section class="hero-section">
    <h1 class="hero-title">DIGITAL COMMAND CENTER</h1>
    <p class="hero-subtitle">YOUR TERMINAL INTERFACE</p>
    <div class="cta-buttons">
      <a href="projects.php" class="cta-button primary">EXPLORE PROJECTS</a>
      <a href="#about" class="cta-button">LEARN MORE</a>
    </div>
  </section>

  <section class="projects-section">
    <h2 class="section-title">PROJECTS</h2>
    <p class="section-subtitle">OUR LATEST PROJECTS</p>
    <div class="project-grid">
      <div class="project-card">
        <div class="project-image-container">
          <img src="images/minecraft4.jpg" alt="Minecraft Learning Lab" class="project-image">
          <img src="images/minecraft3.jpg" alt="Minecraft Experiments" class="project-image-overlay">
        </div>
        <h3 class="project-title">MINECRAFT LEARNING LAB</h3>
        <p class="project-description">Transforming Minecraft into a virtual laboratory where kids experiment with physics, chemistry, and engineering concepts.</p>
        <a href="projects.php" class="project-link">VIEW PROJECT</a>
      </div>
      <div class="project-card">
        <div class="project-image-container">
          <img src="images/lego.png" alt="LEGO AI Integration" class="project-image">
          <img src="images/lego2.jpg" alt="LEGO Robotics" class="project-image-overlay">
        </div>
        <h3 class="project-title">LEGO AI INTEGRATION</h3>
        <p class="project-description">Combining LEGO building with AI programming, teaching kids how to create smart robots and understand machine learning.</p>
        <a href="projects.php" class="project-link">VIEW PROJECT</a>
      </div>
    </div>
  </section>
</main>

<style>
/* Star Background */
.stars {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPgogIDxyZWN0IHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9IiNmZmYiIHg9IjEwIiB5PSIxMCIgLz4KICA8cmVjdCB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSIjZmZmIiB4PSI0MCIgeT0iMzAiIC8+CiAgPHJlY3Qgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0iI2ZmZiIgeD0iNzAiIHk9IjUwIiAvPgogIDxyZWN0IHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9IiNmZmYiIHg9IjkwIiB5PSIxMCIgLz4KICA8cmVjdCB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSIjZmZmIiB4PSIxMjAiIHk9IjMwIiAvPgogIDxyZWN0IHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9IiNmZmYiIHg9IjE1MCIgeT0iNzAiIC8+CiAgPHJlY3Qgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0iI2ZmZiIgeD0iMTcwIiB5PSI5MCIgLz4KICA8cmVjdCB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSIjZmZmIiB4PSIyMTAiIHk9IjEwIiAvPgogIDxyZWN0IHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9IiNmZmYiIHg9IjE5MCIgeT0iNTAiIC8+CiAgPHJlY3Qgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0iI2ZmZiIgeD0iMjMwIiB5PSI0MCIgLz4KPC9zdmc+') repeat;
  opacity: 0.5;
  z-index: -1;
}

/* Main Container */
.main-container {
  position: relative;
  z-index: 1;
  max-width: 1200px;
  margin: 0 auto;
  padding: 2rem;
}

/* Hero Section */
.hero-section {
  text-align: center;
  padding: 4rem 0;
  margin-bottom: 4rem;
}

.hero-title {
  font-family: 'Roboto Mono', monospace;
  font-size: 2.5rem;
  font-weight: 700;
  letter-spacing: 4px;
  text-transform: uppercase;
  margin-bottom: 1rem;
  animation: fadeInDown 1s ease-out;
}

.hero-subtitle {
  font-family: 'Roboto Mono', monospace;
  font-size: 1.2rem;
  color: #AAAAAA;
  margin-bottom: 3rem;
  letter-spacing: 2px;
  animation: fadeInUp 1s ease-out;
}

/* CTA Buttons */
.cta-buttons {
  display: flex;
  gap: 2rem;
  justify-content: center;
  animation: fadeIn 1.5s ease-out;
}

.cta-button {
  padding: 1rem 2rem;
  font-family: 'Roboto Mono', monospace;
  font-size: 1rem;
  text-transform: uppercase;
  letter-spacing: 2px;
  border: 1px solid #FFFFFF;
  background: transparent;
  color: #FFFFFF;
  cursor: pointer;
  transition: all 0.3s;
  text-decoration: none;
  position: relative;
  overflow: hidden;
}

.cta-button::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(
    120deg,
    transparent,
    rgba(255, 255, 255, 0.2),
    transparent
  );
  transition: 0.5s;
}

.cta-button:hover::before {
  left: 100%;
}

.cta-button:hover {
  background: rgba(255, 255, 255, 0.1);
  transform: translateY(-3px);
}

.cta-button.primary {
  background: rgba(255, 255, 255, 0.1);
  border-color: rgba(255, 255, 255, 0.2);
}

/* Projects Section */
.projects-section {
  padding: 2rem 0;
}

.section-title {
  font-family: 'Roboto Mono', monospace;
  font-size: 1.2rem;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 0.5rem;
}

.section-subtitle {
  font-family: 'Roboto Mono', monospace;
  font-size: 0.9rem;
  color: #AAAAAA;
  text-align: center;
  margin-bottom: 2rem;
  letter-spacing: 1px;
}

.project-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
  margin-top: 2rem;
}

.project-card {
  background: rgba(18, 18, 18, 0.7);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 8px;
  overflow: hidden;
  transition: transform 0.3s ease;
}

.project-card:hover {
  transform: translateY(-5px);
}

.project-image-container {
  position: relative;
  width: 100%;
  height: 200px;
  overflow: hidden;
}

.project-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: opacity 0.3s ease;
}

.project-image-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.project-card:hover .project-image {
  opacity: 0.7;
}

.project-card:hover .project-image-overlay {
  opacity: 1;
}

.project-title {
  font-family: 'Roboto Mono', monospace;
  font-size: 1rem;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  padding: 1.5rem 1.5rem 0.5rem;
}

.project-description {
  font-family: 'Roboto Mono', monospace;
  font-size: 0.9rem;
  color: #AAAAAA;
  padding: 0 1.5rem 1.5rem;
  line-height: 1.6;
}

.project-link {
  display: block;
  padding: 1rem 1.5rem;
  font-family: 'Roboto Mono', monospace;
  font-size: 0.8rem;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: #FFFFFF;
  text-decoration: none;
  background: rgba(255, 255, 255, 0.1);
  transition: background 0.3s ease;
}

.project-link:hover {
  background: rgba(255, 255, 255, 0.2);
}

/* Animations */
@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

/* Responsive Design */
@media (max-width: 768px) {
  .hero-title {
    font-size: 2rem;
  }
  
  .cta-buttons {
    flex-direction: column;
    gap: 1rem;
  }
  
  .project-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<?php include 'footer.php'; ?> 