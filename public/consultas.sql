CREATE DATABASE thoth_db;

USE thoth_db;

CREATE TABLE users (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'user',
    status TINYINT(1) NOT NULL DEFAULT 0,
    token VARCHAR(10),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE news (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    summary TEXT NOT NULL,
    content LONGTEXT NOT NULL,
    image VARCHAR(255),
    category VARCHAR(50) NOT NULL,
    published TINYINT(1) NOT NULL DEFAULT 0,
    created_at DATE
);

CREATE TABLE team (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    role VARCHAR(100) NOT NULL,
    bio TEXT NOT NULL,
    photo VARCHAR(255),
    linkedin VARCHAR(255),
    founder TINYINT(1) NOT NULL DEFAULT 0,
    numOrder INT UNSIGNED NOT NULL DEFAULT 0,
    active TINYINT(1) NOT NULL DEFAULT 1
);

CREATE TABLE tickets (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id INT UNSIGNED,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    organization VARCHAR(100),
    area VARCHAR(100),
    message TEXT NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'new',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE tickets
    ADD CONSTRAINT fk_ticket_user FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE faqs (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    question TEXT NOT NULL,
    answer TEXT NOT NULL,
    numOrder INT UNSIGNED NOT NULL DEFAULT 0,
    active TINYINT(1) NOT NULL DEFAULT 1
);

CREATE TABLE partners (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    logo VARCHAR(255) NOT NULL,
    url VARCHAR(255),
    numOrder INT UNSIGNED NOT NULL DEFAULT 0,
    active TINYINT(1) NOT NULL DEFAULT 1
);

CREATE TABLE tools (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    icon VARCHAR(50) NOT NULL,
    category VARCHAR(100) NOT NULL,
    numOrder INT UNSIGNED NOT NULL DEFAULT 0,
    active TINYINT(1) NOT NULL DEFAULT 1
);

CREATE TABLE careers (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    department VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL,
    location VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    requirements TEXT NOT NULL,
    active TINYINT(1) NOT NULL DEFAULT 1
);

INSERT INTO users (first_name, last_name, email, password, role, status) VALUES
    ('Thoth', 'Admin', 'admin@thothbio.com', 'admin123', 'admin', 1);

INSERT INTO news (title, summary, content, image, category, published, created_at) VALUES
    ('Thoth Bio at AACR Annual Meeting 2026', 'Our team will present new findings on AI-generated kinase inhibitors at the upcoming AACR conference in San Diego.', 'Our team will present new findings on AI-generated kinase inhibitors at the upcoming AACR Annual Meeting in San Diego. This conference brings together leading cancer researchers from around the world.', 'news_01.webp', 'Conference', 1, '2026-02-19'),
    ('Thoth Bio Publishes Breakthrough in Multi-Objective Molecular Optimization', 'Our latest research demonstrates a novel approach to simultaneously optimizing drug efficacy, selectivity, and ADMET properties.', 'We are proud to announce the publication of our latest research paper in the Journal of Chemical Information and Modeling. This work introduces a novel multi-objective optimization framework.', 'news_02.webp', 'Publication', 1, '2026-03-14');

INSERT INTO team (name, role, bio, photo, linkedin, founder, numOrder, active) VALUES
    ('Dr. Khaled Barakat', 'Founder & CEO', 'Computational chemist with 15+ years of experience in AI-driven drug discovery. Founded Thoth BioSimulations to bridge the gap between artificial intelligence and molecular design.', 'KB.webp', 'https://www.linkedin.com/in/khaled-barakat-21916140/', 1, 1, 1),
    ('Dr. Sarah Kim', 'Lead Computational Chemist', 'Expert in molecular dynamics and free energy calculations for drug binding.', 'sarah_kim.webp', 'https://linkedin.com/in/sarah-kim', 0, 2, 1),
    ('Dr. Marco Rossi', 'Bioinformatics Lead', 'Specialist in multi-omics data integration and target identification pipelines.', 'marco_rossi.webp', 'https://linkedin.com/in/marco-rossi', 0, 3, 1);

INSERT INTO tickets (user_id, name, email, organization, area, message, status) VALUES
    (NULL, 'Dr. Sarah Johnson', 'sarah.johnson@pharmalab.com', 'PharmaCorp Labs', 'Drug Discovery', 'Estamos interesados en integrar Thoth BioSimulations en nuestro pipeline de descubrimiento. ¿Cuál es el costo de la licencia empresarial?', 'new'),
    (NULL, 'Prof. Michael Chen', 'm.chen@university.edu', 'University Research Group', 'Academic', 'Excelente herramienta para nuestro grupo de investigación. Nos gustaría discutir un acuerdo académico.', 'read'),
    (NULL, 'Emma Rodriguez', 'emma@biotech.io', 'Biotech IO', 'Technical Support', '¿Hay soporte técnico disponible para usuarios empresariales? Necesitamos asistencia en tiempo real.', 'replied');

INSERT INTO faqs (question, answer, numOrder, active) VALUES
    ('What is computational drug discovery?', 'Computational drug discovery uses algorithms and molecular simulations to identify and optimize drug candidates before laboratory experiments, reducing time and cost.', 1, 1),
    ('How does the Thoth platform work?', 'Our platform integrates graph neural networks, molecular dynamics simulations, and ADMET predictors to evaluate candidate compounds rapidly.', 2, 1),
    ('Do you offer academic partnerships?', 'Yes. We actively collaborate with academic institutions and research hospitals under both fee-for-service and co-development models.', 3, 1);

INSERT INTO partners (name, description, logo, url, numOrder, active) VALUES
    ('Alberta Innovates', 'Leading provincial agency supporting innovation and research in Alberta.', 'AI.webp', 'https://albertainnovates.ca', 1, 1),
    ('Genome Alberta', 'Genomics research organization advancing precision medicine in Canada.', 'GA.webp', 'https://genomealberta.ca', 2, 1),
    ('Health Innovation Hub', 'Accelerating health innovation through partnerships and investment.', 'HIH_logo.webp', 'https://hih.ca', 3, 1),
    ('Technology Access Program', 'Supporting SMEs with access to research facilities and expertise.', 'TAP.webp', 'https://nrc.canada.ca', 4, 1),
    ('Scale-up Canada', 'Helping Canadian companies scale their innovations globally.', 'Sclae-up-Canada.webp', 'https://scaleupcanada.ca', 5, 1);

INSERT INTO tools (name, description, icon, category, numOrder, active) VALUES
    ('Molecular Modeling', 'Physics-based molecular dynamics simulations, energy minimization, and conformational analysis for understanding molecular behavior and interactions at atomic resolution.', 'atom', 'Molecular Modeling', 1, 1),
    ('AI-Based Drug Design', 'Generative deep learning models that design novel molecular scaffolds optimized for target affinity, selectivity, and drug-likeness properties.', 'brain', 'Drug Design', 2, 1),
    ('Protein Structure Prediction', 'AI-powered prediction of three-dimensional protein structures from amino acid sequences, enabling structure-based drug design campaigns.', 'layers', 'Protein Prediction', 3, 1),
    ('Bioinformatics Pipelines', 'Automated workflows for genomic analysis, transcriptomics, and multi-omics data integration for target identification and validation.', 'dna', 'Bioinformatics', 4, 1),
    ('Binding Affinity Prediction', 'Machine learning models trained on experimental data to predict ligand-protein binding affinities and selectivity profiles with high accuracy.', 'activity', 'Binding Affinity', 5, 1),
    ('Chemical Space Explorer', 'High-dimensional analysis and visualization of chemical libraries, enabling efficient navigation of vast molecular design spaces.', 'database', 'Molecular Modeling', 6, 1);

INSERT INTO careers (title, department, type, location, description, requirements, active) VALUES
    ('Senior Computational Chemist', 'Computational Chemistry', 'Full-time', 'Edmonton, Alberta', 'Lead the development of new molecular simulation methods and validate computational results against experimental data.', 'PhD in Computational Chemistry or Biochemistry, 5+ years experience with molecular simulation software.', 1),
    ('Machine Learning Engineer', 'AI Research', 'Full-time', 'Remote / Edmonton', 'Design and implement generative models for molecular design at the intersection of deep learning and computational chemistry.', 'MSc or PhD in Machine Learning or related field, experience with PyTorch or TensorFlow.', 1),
    ('Bioinformatics Research Intern', 'Bioinformatics', 'Internship', 'Remote', 'Support genomics and transcriptomics analysis pipelines for target identification in oncology programs.', 'Currently enrolled in BSc or MSc in Bioinformatics or related field.', 1);