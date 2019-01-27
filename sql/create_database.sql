DROP database zlearn;
CREATE database zlearn;
USE zlearn;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `categorie` (`id_categorie`, `nom`, `description`) VALUES
(1, 'Programmation', 'Dans le domaine de l\'informatique, la programmation est l\'ensemble des activités qui permettent l\'écriture des programmes informatiques.\nC\'est une étape importante du développement de logiciels (voire de matériel).'),
(2, 'Informatique', 'Le terme « informatique » résulte de l\'association du terme « information » au suffixe « -ique » signifiant « qui est propre à ».\nComme adjectif, il s\'applique à l\'ensemble des traitements liés à l\'emploi des ordinateurs et systèmes numériques. Comme substantif, il désigne les activités liées à la conception et à la mise en œuvre de ces machines. '),
(3, 'Langue', 'Une langue est un système évolutif de signes linguistiques, vocaux, graphiques ou gestuels, qui permet la communication entre les individus.');

CREATE TABLE `conversations` (
  `id_conversation` int(11) NOT NULL,
  `id_utilisateurs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cours` (
  `id_cours` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_sous_categorie` int(11) DEFAULT NULL,
  `date_poste` datetime NOT NULL,
  `intitule` varchar(350) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cours` (`id_cours`, `id_utilisateur`, `id_categorie`, `id_sous_categorie`, `date_poste`, `intitule`, `description`) VALUES
(1, 1, 1, 1, '2018-07-16 02:43:20', 'Qu\'est ce que le Php', 'Dans le domaine de l\'informatique, la programmation est l\'ensemble des activités qui permettent l\'écriture des programmes informatiques.\nC\'est une étape importante du développement de logiciels (voire de matériel).'),
(2, 1, 2, 4, '2018-07-16 02:43:20', 'Qu\'est ce que le HardWare ', 'Le matériel informatique comprend les parties physiques ou les composants d\'un ordinateur,\ntels que l\'unité centrale, le moniteur, le clavier, le stockage de données informatiques,\n la carte graphique, la carte son, les haut-parleurs et la carte mère.En revanche, les logiciels sont des instructions qui peuvent être stockées et exécutées par le matériel.');

CREATE TABLE `cours_commentaires` (
  `id_cours_commentaire` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_sous_categorie` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL,
  `commentaire` varchar(2000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cours_suivi` (
  `id_cours_suivi` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `id_conversation` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `heure` datetime NOT NULL,
  `message` mediumtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `sous_categorie` (
  `id_sous_categorie` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `description` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `sous_categorie` (`id_sous_categorie`, `id_categorie`, `nom`, `description`) VALUES
(1, 1, 'Php', 'PHP: Hypertext Preprocessor3, plus connu sous son sigle PHP (acronyme récursif), est un langage de programmation libre4, principalement utilisé pour produire des pages Web dynamiques via un serveur HTTP3, mais pouvant également fonctionner comme n\'importe quel langage interprété de façon locale. PHP est un langage impératif orienté objet.\nPHP a permis de créer un grand nombre de sites web célèbres, comme Facebook, Wikipédia, etc.5 Il est considéré comme une des bases de la création de sites web dits dynamiques mais également des applications web.'),
(2, 1, 'MYSQL', 'MySQL est un système de gestion de bases de données relationnelles (SGBDR). Il est distribué sous une double licence GPL et propriétaire. Il fait partie des logiciels de gestion de base de données les plus utilisés au monde3, autant par le grand public (applications web principalement) que par des professionnels, en concurrence avec Oracle, Informix et Microsoft SQL Server.'),
(3, 1, 'JavaScript', 'JavaScript est un langage de programmation de scripts principalement employé dans les pages web interactives mais aussi pour les serveurs2 avec l\'utilisation (par exemple) de Node.js3. C\'est un langage orienté objet à prototype, c\'est-à-dire que les bases du langage et ses principales interfaces sont fournies par des objets qui ne sont pas des instances de classes, mais qui sont chacun équipés de constructeurs permettant de créer leurs propriétés, et notamment une propriété de prototypage qui permet d\'en créer des objets héritiers personnalisés. En outre, les fonctions sont des objets de première classe. Le langage supporte le paradigme objet, impératif et fonctionnel. JavaScript est le langage possédant le plus large écosystème grâce à son gestionnaire de dépendances npm, avec environs 500 000 paquets en août 20174.'),
(4, 2, 'Linux', 'Linux est, au sens restreint, le noyau de système d\'exploitation Linux, et au sens large, tout système d\'exploitation fondé sur le noyau Linux. Cet article couvre le sens large.\nÀ l\'origine, le noyau Linux a été développé pour les ordinateurs personnels compatibles PC, et devait être accompagné des logiciels GNU pour constituer un système d\'exploitation. Les partisans du projet GNU promeuvent depuis le nom combiné GNU/Linux.\nDepuis les années 2000, le noyau Linux est utilisé sur du matériel informatique allant des téléphones portables aux super-ordinateurs, et n\'est pas toujours accompagné de logiciels GNU.\nC\'est notamment le cas d\'Android, qui équipe plus de 80 % des smartphones.Le noyau Linux a été créé en 1991 par Linus Torvalds. C\'est un logiciel libre. Les distributions Linux ont été, et restent, un important vecteur de popularisation du mouvement open source.'),
(5, 2, 'Windows', 'Windows (littéralement « Fenêtres » en anglais) est au départ une interface graphique unifiée produite par Microsoft, qui est devenue ensuite une gamme de systèmes d’exploitation à part entière, principalement destinés aux ordinateurs compatibles PC.'),
(6, 3, 'Anglais', 'L\'anglais est une langue indo-européenne germanique originaire d\'Angleterre qui tire ses racines de langues du nord de l\'Europe (terre d\'origine des Angles, des Saxons et des Frisons) dont le vocabulaire a été enrichi et la syntaxe et la grammaire modifiées par la langue normande apportée par les Normands, puis par le français avec les Plantagenêt. La langue anglaise est ainsi composée d\'environ 60 à 70 % de mots d\'origine normande et française3,4. L\'anglais est également très influencé par les langues romanes, en particulier par l\'utilisation de l\'alphabet latin ainsi que les chiffres arabes.'),
(7, 3, 'Espagnol', 'L’espagnol (en espagnol español), ou le castillan (en espagnol castellano), est une langue romane parlée en Espagne et dans de nombreux pays d\'Amérique et d\'autres territoires dans le monde associés à un moment de leur histoire à l\'Empire espagnol.'),
(8, 1, 'C#', 'ok');

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_naissance` datetime NOT NULL,
  `email` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_deconnexion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `utilisateurs` (`id_utilisateur`, `mdp`, `date_inscription`, `pseudo`, `nom`, `prenom`, `date_naissance`, `email`, `description`, `photo`, `score`, `status`, `date_deconnexion`) VALUES
(1, 'e2B/', '2018-07-09 10:53:48', 'aze', 'aze', 'aze', '2222-02-22 00:00:00', 'aze@aze.fr', 'Veuillez entrer une description', '../view/images/profil_default.jpg', 1165, 0, '2018-08-28 12:52:01'),
(2, 'e2B/', '2018-07-09 10:53:48', 'admin', 'aze', 'aze', '2222-02-22 00:00:00', 'aze@aze.fr', 'Veuillez entrer une description', '../view/images/profil_default.jpg', 0, 0, '0000-00-00 00:00:00'),
(3, 'fXN1', '2018-07-29 18:56:32', 'gio', 'gio', 'gio', '2525-02-25 00:00:00', 'gio@gio.fr', 'Veuillez entrer une description', '../view/images/profil_default.jpg', 1130, 0, '0000-00-00 00:00:00'),
(4, 'a2l+', '2018-08-05 06:25:02', 'qsd', 'qsd', 'qsd', '4141-08-04 00:00:00', 'qsd@qsd.fr', 'Veuillez entrer une description', '../view/images/profil_default.jpg', 0, 0, '0000-00-00 00:00:00');

ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id_conversation`);

ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `utilisateurs` (`id_utilisateur`),
  ADD KEY `categorie` (`id_categorie`),
  ADD KEY `sous_categorie` (`id_sous_categorie`);

ALTER TABLE `cours_commentaires`
  ADD PRIMARY KEY (`id_cours_commentaire`);

ALTER TABLE `cours_suivi`
  ADD PRIMARY KEY (`id_cours_suivi`);

ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `conversations` (`id_conversation`);

ALTER TABLE `sous_categorie`
  ADD PRIMARY KEY (`id_sous_categorie`),
  ADD KEY `id_categorie` (`id_categorie`);

ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `conversations`
  MODIFY `id_conversation` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cours`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `cours_commentaires`
  MODIFY `id_cours_commentaire` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cours_suivi`
  MODIFY `id_cours_suivi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `sous_categorie`
  MODIFY `id_sous_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
