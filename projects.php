<?php include 'header.php'; ?>

<main class="projects-container">
  <h1 class="projects-title">PROJECTS</h1>
  <p class="projects-subtitle">WHERE GAMING MEETS LEARNING</p>
  
  <div class="projects-grid">
    <!-- Project Card 1: Minecraft Learning Lab -->
    <div class="project-card">
      <div class="project-content">
        <div class="project-image-container">
          <img src="images/minecraft4.jpg" alt="Minecraft Learning Lab" class="project-image">
          <img src="images/minecraft3.jpg" alt="Minecraft Experiments" class="project-image-overlay">
        </div>
        <h2 class="project-title">MINECRAFT LEARNING LAB</h2>
        <p class="project-description">Transforming Minecraft into a virtual laboratory where kids experiment with physics, chemistry, and engineering concepts through interactive gameplay.</p>
        <div class="project-tags">
          <span class="tag">STEM EDUCATION</span>
          <span class="tag">VIRTUAL LABS</span>
          <span class="tag">INTERACTIVE LEARNING</span>
        </div>
      </div>
    </div>

    <!-- Project Card 2: LEGO AI Integration -->
    <div class="project-card">
      <div class="project-content">
        <div class="project-image-container">
          <img src="images/lego.png" alt="LEGO AI Integration" class="project-image">
          <img src="images/lego2.jpg" alt="LEGO Robotics" class="project-image-overlay">
        </div>
        <h2 class="project-title">LEGO AI INTEGRATION</h2>
        <p class="project-description">Combining LEGO building with AI programming, teaching kids how to create smart robots and understand machine learning through hands-on play.</p>
        <div class="project-tags">
          <span class="tag">ROBOTICS</span>
          <span class="tag">AI EDUCATION</span>
          <span class="tag">CREATIVE BUILDING</span>
        </div>
      </div>
    </div>

    <!-- Project Card 3: Roblox Coding Academy -->
    <div class="project-card">
      <div class="project-content">
        <div class="project-image-container">
          <img src="images/minecraft2.jpg" alt="Roblox Coding Academy" class="project-image">
          <img src="images/lego3.png" alt="Roblox Development" class="project-image-overlay">
        </div>
        <h2 class="project-title">ROBLOX CODING ACADEMY</h2>
        <p class="project-description">Teaching programming fundamentals through Roblox game development, helping kids learn coding while creating their own virtual worlds.</p>
        <div class="project-tags">
          <span class="tag">GAME DEVELOPMENT</span>
          <span class="tag">CODING FOR KIDS</span>
          <span class="tag">CREATIVE DESIGN</span>
        </div>
      </div>
    </div>

    <!-- Project Card 4: Virtual Science Lab -->
    <div class="project-card">
      <div class="project-content">
        <div class="project-image-container">
          <img src="images/lego3.png" alt="Virtual Science Lab" class="project-image">
          <img src="images/lego4.jpg" alt="Science Experiments" class="project-image-overlay">
        </div>
        <h2 class="project-title">VIRTUAL SCIENCE LAB</h2>
        <p class="project-description">Interactive virtual experiments that combine gaming elements with real-world scientific principles, making learning fun and engaging.</p>
        <div class="project-tags">
          <span class="tag">SCIENCE EDUCATION</span>
          <span class="tag">VIRTUAL EXPERIMENTS</span>
          <span class="tag">INTERACTIVE LEARNING</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Additional Projects Section -->
  <div class="additional-projects">
    <h2 class="additional-title">MORE LEARNING ADVENTURES</h2>
    <div class="additional-grid">
      <div class="additional-card">
        <img src="images/lego5.jpg" alt="LEGO Engineering" class="additional-image">
        <h3>LEGO ENGINEERING</h3>
        <p>Building complex structures while learning engineering principles</p>
      </div>
      <div class="additional-card">
        <img src="images/minecraft3.jpg" alt="Minecraft Physics" class="additional-image">
        <h3>MINECRAFT PHYSICS</h3>
        <p>Exploring physics concepts through virtual world building</p>
      </div>
    </div>
  </div>

  <!-- Dedicated Section -->
  <div class="dedicated-section">
    <h2 class="dedicated-title">FUTURE OF LEARNING</h2>
    <p class="dedicated-description">
      Discover how gaming and technology are revolutionizing education. Through Minecraft, Roblox, and LEGO, we're creating immersive learning experiences that prepare children for the future. Our projects combine AI, programming, and interactive play to develop critical thinking, creativity, and problem-solving skills.
    </p>
    <a href="https://github.com/strikerdlm/SpaceX-Terminal-Interface" target="_blank" class="dedicated-link-button">EXPLORE OUR PROJECTS</a>
  </div>
</main>

<style>
/* Project Card Styling */
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

/* Additional Projects Styling */
.additional-projects {
  margin-top: 4rem;
  padding: 2rem;
  background: rgba(18, 18, 18, 0.7);
  border-radius: 8px;
}

.additional-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
  margin-top: 2rem;
}

.additional-card {
  background: rgba(0, 0, 0, 0.3);
  padding: 1.5rem;
  border-radius: 8px;
  transition: transform 0.3s ease;
}

.additional-card:hover {
  transform: translateY(-5px);
}

.additional-image {
  width: 100%;
  height: 150px;
  object-fit: cover;
  border-radius: 4px;
  margin-bottom: 1rem;
}

/* Consistent Typography */
.project-title, .additional-title, .dedicated-title {
  font-family: 'Roboto Mono', monospace;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.project-description, .additional-card p, .dedicated-description {
  font-family: 'Roboto Mono', monospace;
  font-weight: 400;
  line-height: 1.6;
}

/* Tag Styling */
.tag {
  display: inline-block;
  padding: 0.3rem 0.8rem;
  margin: 0.3rem;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 4px;
  font-size: 0.8rem;
  text-transform: uppercase;
  letter-spacing: 1px;
}
</style>

<?php include 'footer.php'; ?> 