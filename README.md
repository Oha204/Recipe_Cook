# PROJET 
Site de recettes de cuisine, avec présence d'un backoffice pour ajouter, supprimer ou modifier des recettes.

<img src="/assets/imgReadMe/home.png"/>
<img src="/assets/imgReadMe/listeRecette.png"/>
<img src="/assets/imgReadMe/LoginForm.png"/>
<img src="/assets/imgReadMe/Backoffice.png"/>

## Stacks Techniques : 
HTML / CSS / PHP / JAVASCRIPT / BOOSTRAP - 
SQL / MYSQL / PHPMYADMIN

## Login BO : 
Connectez-vous en tant qu'administrateur au BO du site afin d'ajouter, modifier ou supprimer une/des recette(s).
- id et mdp : cf fichier auth.php

## Création BDD :
- Table "categories" :
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_cat` enum('Entrée','Plat chaud','Plat froid','Dessert') DEFAULT NULL,
  `img_icon_cat` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

- Contenu de la table "categories" :
INSERT INTO `categories` (`id`, `name_cat`, `img_icon_cat`) VALUES
(1, 'Entrée', 'entree.png'),
(2, 'Plat chaud', 'plat_chaud.png'),
(3, 'Plat froid', 'plat_froid.png'),
(4, 'Dessert', 'dessert.png');

- Table "recettes" :
CREATE TABLE `recettes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `img_principale` varchar(200) DEFAULT NULL,
  `img_second` varchar(45) DEFAULT NULL,
  `img_tert` text NOT NULL,
  `img_quatr` text NOT NULL,
  `ingredient` text,
  `cooking_tool` text,
  `steps` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `categories_id` int NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_recettes_categories1_idx` (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb3;

- Contenu de la table "recettes" :
INSERT INTO `recettes` (`id`, `title`, `author`, `publication_date`, `img_principale`, `img_second`, `img_tert`, `img_quatr`, `ingredient`, `cooking_tool`, `steps`, `categories_id`, `active`) VALUES
(1, 'Saumon mariné aux épices & citron vert', 'Léo A.', '2023-08-15', 'saumon_marine_epice-citron-vert.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '1 pinc. piment d\'espelette, \r\n1 càs miel, \r\n1/4 citron vert, \r\n1 saumon, \r\n1/4 oignon rouge, \r\n1 poivron,\r\n70g riz\r\n', 'Four, \r\ncasserole, \r\nplaques de cuisson, \r\nplat à gratin', 'étape 1 : Préchauffez le four à 220°C. Dans un bol, préparez la marinade en mélangeant : le jus de citron, le miel, le piment d\'Espelette, du sel, du poivre et un bon filet d\'huile d\'olive., \r\nétape 2 : Arrosez le saumon avec la marinade., \r\nétape 3 : Pelez l\'oignon et coupez-le en gros morceaux., \r\nétape 4 : Lavez puis coupez les poivrons en retirant le cœur avec les pépins. Coupez-les en gros morceaux., \r\nétape 5 : Sur une plaque recouverte de papier cuisson, ajoutez le saumon mariné, l\'oignon et les poivrons. Assaisonnez avec la marinade restante, du sel et du poivre. Enfournez 15 à 20 minutes à 220°C. Pour un saumon croustillant, mettez le four en mode grill pendant 2 minutes en fin de cuisson., \r\nétape 6 : Pendant ce temps, faites cuire le riz selon les instructions du paquet. En fin de cuisson, égouttez-le., \r\nétape 7 : Sortez le plat du four et servez le saumon avec les légumes grillés et le riz. Arrosez le saumon de jus de citron. C\'est prêt !', 2, 1),
(2, 'Bœuf & légumes sautés au pesto', 'Sophia Z.', '2023-08-13', 'boeuf-legume-saute-pesto.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '1 boeuf, \r\n1 càs sauce pesto, \r\n100g tomate cerise, \r\n100g courgette, \r\n1/2 poivron rouge, \r\n1/4 gou. ail', 'plaques de cuisson, \r\npoêle', 'étape 1 : Lavez les légumes. Coupez les courgettes en demi-rondelles de 0,5 cm environ., \r\nétape 2 : Coupez les poivrons en gros cubes., \r\nétape 3 : Dans une grande poêle, ajoutez un filet d\'huile d\'olive, les légumes, sel, et poivre. Râpez ou émincez l\'ail et faites revenir les légumes pendant 10 minutes à feu fort en remuant., \r\nétape 4 : Après 10 minutes de cuisson, ajoutez le bœuf avec un filet d\'huile d\'olive et faites le cuire 2 minutes de chaque côté pour une cuisson saignante., \r\nétape 5 : Éteignez le feu, ajoutez le pesto dans la poêle et mélangez., \r\nétape 6 : Pendant ce temps, faites cuire le riz selon les instructions du paquet. En fin de cuisson, égouttez-le., \r\nétape 7 : Coupez le bœuf en lamelles et servez-le avec les légumes au pesto. C\'est prêt !\'', 2, 1),
(3, 'Cheesecake aux framboises', 'Bob Y.', '2023-08-10', 'cheesecake-framboises.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '70g beurre, \r\n750g fromage frais, \r\n120g sucre, \r\n2 sac. sucre vanillé, \r\n5 œufs, \r\n13cl crème liquide,\r\n200g framboises, \r\n175g palet breton', 'Four, \r\nmoule à manqué, \r\npapier cuisson', 'étape 1 : Cette recette nécessite un temps de repos de 2h minimum. Préchauffez le four à 180°C. Ajoutez les biscuits dans un grand récipient et écrasez-les à l\'aide du fond d\'un verre., \nétape 2 : Faites fondre le beurre au micro-ondes ou dans une petite casserole. Mélangez les biscuits émiettés et le beurre fondu avec une pincée de sel., \nétape 3 : Dans un moule à manqué de préférence avec bords amovibles (sinon placez une feuille de papier sulfurisé dans le fond), versez le mélange biscuits/beurre et tassez-le à l\'aide du dos d\'une cuillère. Enfournez à 180°C pendant 10 minutes., \nétape 4 : Pendant ce temps, dans un saladier réalisez l\'appareil à cheesecake en mélangeant : le fromage frais, le sucre, le sucre vanillé, 3 œufs entiers, 2 jaunes d\'œufs et la crème liquide, jusqu\'à l\'obtention d\'une texture homogène., \nétape 5 : Une fois le biscuit précuit, sortez-le du four et montez la température du four à 200°C., \nétape 6 : Versez l\'appareil à cheesecake sur le biscuit et ré-enfournez pendant 15 minutes à 200°C. Au bout des 15 minutes, baissez à 100°C et poursuivez la cuisson pendant 1 heure environ., \nétape 7 : En fin de cuisson, éteignez le four et laissez le cheesecake refroidir dans le four. Réservez ensuite au frais au moins 2 heures ou jusqu’au service.,\nétape 8 : Démoulez le cheesecake et décorez-le avec les framboises. C\'est prêt !\'', 4, 1),
(4, 'Gratin de gnocchis au brocoli', 'Coline M.', '2023-08-08', 'gratin-gnocchi-brocoli.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '1/4 brocoli, \r\n125g gnocchi, \r\n50g ricotta, \r\n1 càs parmesan, \r\n1 poignée épinard, \r\n1/4 gou. ail,\r\n1/8 citron', 'Four, \r\nPlaque de cuisson, \r\nPoêle', 'étape 1 : Préchauffez le four à 200°C. Lavez puis découpez les brocolis en sommités. (Pour des brocolis plus tendres, faites-les pré-cuire à la vapeur 5 minutes)., \r\nétape 2 : Émincez l\'ail finement., \r\nétape 3 : Dans une poêle, ajoutez un filet d\'huile d\'olive, l\'ail, les brocolis et les gnocchis. Faites revenir pendant 2 minutes à feu vif., \r\nétape 4 : Ajoutez un filet d\'eau et cuire à couvert pendant 5 minutes à feu moyen., \r\nétape 5 : Assaisonnez et ajoutez les épinards et cuire 2 minutes de plus., \r\nétape 6 : Une fois la cuisson terminée, ajoutez la ricotta, salez, poivrez, mélangez., \r\nétape 7 : Ajoutez le tout dans un plat allant au four, saupoudrez de parmesan et enfournez pendant 10 à 15 minutes. Le dessus doit être doré.,\r\nétape 8 : (Optionnel : ajoutez un peu de zeste de citron jaune au moment de servir). C\'est prêt !', 2, 1),
(5, 'Aubergine rôtie au curcuma', 'Zoé G.', '2023-08-06', 'aubergine-rôtie-curcuma.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '1 aubergine, \r\n92g yaourt végétal, \r\n170g pois chiches, \r\n1/4 càs curcuma', 'Four, \r\nPapier cuisson, \r\nMoule à manqué', 'étape 1 : Préchauffez le four à 200°C. Lavez puis coupez les aubergines en 2 dans la longueur., \r\nétape 2 : À l\'aide de la pointe d\'un couteau, réalisez des croisillons dans la chair sans percer la peau., \r\nétape 3 : Mélangez 2 cui. à soupe d\'huile d\'olive par personne avec le curcuma.Dans une poêle, ajoutez un filet d\'huile d\'olive, l\'ail, les brocolis et les gnocchis. Faites revenir pendant 2 minutes à feu vif., \r\nétape 4 : Placez les aubergines sur une plaque de cuisson recouverte de papier sulfurisé et badigeonnez-les avec une partie de l\'huile au curcuma., \r\nétape 5 : Salez, poivrez puis enfournez 30 minutes à 200°C., \r\nétape 6 : Pendant ce temps, rincez puis égouttez les pois chiches et mélangez-les avec le reste de l\'huile au curcuma, sel, poivre., \r\nétape 7 : Au bout de 15 minutes de cuisson des aubergines, ajoutez les pois chiches sur la plaque de cuisson et ré-enfournez jusqu\'à la fin de la cuisson des aubergines.,\r\nétape 8 : Une fois les légumes cuits, servez les aubergines avec le yaourt, les pois chiches, quelques feuilles de coriandre, sel, poivre, c\'est prêt !', 2, 1),
(6, 'Crème brûlée', 'Adrien S.', '2023-08-03', 'creme-brulee.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '50cl crème liquide, \r\n100g sucre, \r\n6 oeufs, \r\n1 gou. vanille,\r\n8 càs sucre de canne', 'Four, \r\nplaques de cuisson, \r\nfouet, \r\nramequin, \r\nplat à gratin, \r\nchalumeau', 'étape 1 : Préchauffez le four à 160°C. Égrainez la gousse de vanille en la coupant en deux dans le sens de la longueur puis en glissant la lame du couteau tout en raclant les grains. Gardez le reste de la gousse., \r\nétape 2 : Faites chauffer la crème dans une casserole sur feu doux et ajoutez les grains de vanille ainsi que la gousse. Laissez infuser le tout environ 5 minutes., \r\nétape 3 : Pendant ce temps, séparez les blancs des jaunes d\'œufs et gardez les jaunes., \r\nétape 4 : Dans un saladier, fouettez les jaunes avec le sucre en poudre jusqu\'à ce que le mélange devienne mousseux., \r\nétape 5 : Enlevez la gousse de vanille de la crème à l\'aide d\'une cuillère et versez progressivement la crème tiède sur le mélange jaune/sucre tout en fouettant., \r\nétape 6 : Versez la crème dans des ramequins et enfournez pendant 35 minutes à 160°C au bain marie., \r\nétape 7 : Sortez du four et mettez les crèmes au frigo 1 heure minimum.,\r\nétape 8 : Avant de servir, parsemez le dessus des crèmes brûlées avec le sucre de canne (soit 1 cuillère à soupe par portion).,\r\nétape 9 : Munissez vous d\'un chalumeau et faites caraméliser le sucre sur le dessus. Servez, c\'est prêt !', 4, 1),
(7, 'Cookie géant', 'Margot N.', '2023-08-01', 'cookie-geant.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '200g beurre, \r\n350g farine de blé, \r\n120g sucre de canne, \r\n4 œufs,\r\n200g de chocolat,\r\n1 sac. levure chimique', 'Four, \r\ncasserole, \r\nfouet, \r\nplaque de cuisson,\r\npoêle', 'étape 1 : Hachez grossièrement le chocolat. Mettez 5 carrés de chocolat de côté., \r\nétape 2 : Faites fondre le beurre à la casserole ou au micro-ondes. Versez le beurre dans un saladier et ajoutez le sucre roux. Fouettez le mélange., \r\nétape 3 : Ajoutez les œufs tout en fouettant. Ajoutez une pincée de sel., \r\nétape 4 : Ajoutez la farine, la levure et mélangez à l\'aide d\'une cuillère en bois., \r\nétape 5 : Ajoutez le chocolat haché et mélangez. Placez au frais minimum 30 minutes., \r\nétape 6 : Préchauffez le four à 180°C. Beurrez votre moule (ici, on utilise une poêle allant au four ça marche très bien aussi !)., \r\nétape 7 : Étalez la pâte à l\'aide de vos mains sur toute la surface du moule et déposez les carrés de chocolat mis de côté sur le dessus en les enfonçant légèrement.,\r\nétape 8 : Enfournez pour 35-40 minutes à 180°C. Le dessus du cookie doit être doré. Parsemez de fleur de sel avant de déguster, c\'est prêt !', 4, 1),
(8, 'Aubergine braisée au porc', 'Justin X.', '2023-07-28', 'aubergine-braisee-porc.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '150g aubergine, \r\n60g chair à saucisse, \r\n1 gou. ail, \r\n5g gingembre,\r\n1 càs sucre,\r\n1 càs sauce soja salée,\r\n70g riz', 'plaque de cuisson, \r\ncasserole, \r\npoêle, \r\nrâpe', 'étape 1 : Rincez les aubergines, coupez-les en morceaux réguliers. Salez et faites dégorger dans une passoire., \r\nétape 2 : Pendant ce temps, épluchez puis râpez l\'ail et le gingembre. Réservez. , \r\nétape 3 : Si vous en avez, hachez la ciboulette à l\'aide d\'un couteau., \r\nétape 4 : Mélangez le sucre et la sauce soja., \r\nétape 5 : Essuyez les aubergines avec un torchon ou un papier absorbant., \r\nétape 6 : Chauffez un filet d\'huile dans une grande poêle. Faites dorer les aubergines pendant environ 5 minutes. Réservez sur du papier absorbant., \r\nétape 7 : Dans la même poêle, remettez un tout petit peu d’huile et faites dorer l’ail et le gingembre. Lorsqu’ils commencent à colorer, ajoutez la chair à saucisse. Mélangez pour détacher les morceaux.,\r\nétape 8 : Ajoutez la sauce, poivrez généreusement et remuez. Remettez les aubergines et 3cl d’eau par portion. Baissez le feu et laissez cuire environ 10 minutes.,\r\nétape 9 : Pendant ce temps faites cuire le riz dans une casserole d\'eau bouillante salée selon les indications du paquet soit environ 10 minutes.,\r\nétape 10 : Après 10 minutes, l’eau doit être évaporée et les aubergines tendres. Piquez avec la pointe d’un couteau pour vérifier.,\r\nétape 11 : Hors du feu ajoutez la ciboulette sur les aubergines si vous en avez, et égouttez le riz. Servez bien chaud, c\'est prêt !', 2, 1),
(9, 'Palet veggie, légumes rôtis & tzatziki', 'Domitille L.', '2023-07-25', 'palet-veggie-rostis-tzatziki.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '150g patate douce, \r\n1 courgette, \r\n1/4 oignon rouge, \r\n100g de galette de légume,\r\n50g tzatziki,\r\n1 pinc. thym', 'four', 'étape 1 : Préchauffez le four à 200°C. Épluchez les patates douces, puis coupez-les en petits cubes., \r\nétape 2 : Lavez puis coupez les courgettes en deux dans le sens de la longueur, puis en demi lunes., \r\nétape 3 : Épluchez puis coupez l\'oignon rouge en quartiers., \r\nétape 4 : Sur une plaque recouverte de papier cuisson, ajoutez les patates douces, les courgettes et l\'oignon rouge. Arrosez d\'un bon filet d\'huile d\'olive. Salez, poivrez et ajoutez du thym. Mélangez le tout. Enfournez 15 minutes à 200°C., \r\nétape 5 : Au bout des 15 minutes, ajoutez les galettes de légumes sur la plaque et enfournez de nouveau 15 minutes à 200°C., \r\nétape 6 : Dans une assiette, servez les légumes rôtis avec les galettes veggie. Ajoutez le tzatziki et quelques feuilles de persil si vous en avez. C\'est prêt !', 2, 1),
(10, 'Rouleaux de printemps à la crevette', 'Camille C.', '2023-07-23', 'Rouleaux_printemps_crevette.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '2 càs Sauce soja salée, \r\n5 Feuille de riz, \r\n60gr Vermicelles de riz, \r\n60gr Crevette (cuite),\r\n80g Carotte,\r\n1/50 bou. Menthe (feuilles)', 'Plaques de cuisson, \r\nÉconome, \r\nPassoire, \r\nCasserole', 'étape 1 : Dans une casserole d\\\'eau bouillante, faites cuire les vermicelles de riz selon les instructions du paquet., \r\nétape 2 : Épluchez les carottes et râpez-les à l\'aide d\'une râpe ou d\'un économe., \r\nétape 3 : Décortiquez les crevettes si elles ne le sont pas déjà. Réservez., \r\nétape 4 : Une fois les vermicelles cuits, égouttez-les et rincez-les à l\'eau froide. Mettez-les de côté., \r\nétape 5 : Pour rouler vos rouleaux de printemps, vous aurez besoin d\'une assiette (légèrement creuse) remplie d\'eau chaude (1 cm suffit) et assez grande pour accueillir les feuilles de riz. Prêt ?, \r\nétape 6 : Placez 1 feuille de riz dans l\'eau chaude, immergez-la totalement et attendez jusqu\'à ce qu\'elle soit entièrement molle. Placez-la délicatement à plat sur le plan de travail pour ne pas la déchirer. Mettez aussitôt 1 seconde feuille de riz dans l\'eau.,\r\nétape 7 : Garnissez votre feuille de riz avec : 2 ou 3 feuilles de menthe, une poignée de carottes râpées, 2 ou 3 crevettes et 1 petite poignée de vermicelles.,\r\nétape 8 : Repliez la feuille : repliez les bords vers l\'intérieur, enroulez délicatement la garniture (jusqu\'à la moitié de la feuille environ) puis finissez de rouler le tout, voilà !,\r\nétape 9 : Recommencez autant de fois que vous avez de feuilles,\r\nétape 10 : Servez les rouleaux de printemps avec de la sauce soja pour les tremper dedans ! C\'est prêt !', 3, 1),
(11, 'Salade de concombre au cacahuètes', 'Victoire Q.', '2023-07-20', 'Salade_concombre_cacahuetes.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '250gr Concombre, \r\n15gr Cacahuète, \r\n1/10 bou. Coriandre, \r\n1/4 Oignon rouge,\r\n1 pinc. Cumin,\r\n1/4 Citron jaune', 'Plaques de cuisson, \r\nPoêle', 'étape 1 : Concassez grossièrement les cacahuètes., \r\nétape 2 : Lavez, puis hachez la coriandre., \r\nétape 3 : Dans une poêle chaude, ajoutez 1cu. à soupe d\'huile/personne (colza/tournesol/huile d\'olive/etc) : les graines de cumin (ou le cumin) et les cacahuètes., \r\nétape 4 : Faire revenir pendant 2min en remuant régulièrement, jusqu\'à ce que les cacahuètes soient dorées., \r\nétape 5 : Lavez puis coupez le concombre en fines tranches., \r\nétape 6 : Coupez les oignons en 2 puis en fines lamelles.,\r\nétape 7 : Dans un récipient ajoutez : le concombre, les oignons, le mélange cacahuète-cumin, le jus de citron, salez, poivrez, mélangez.,\r\nétape 8 : Servir avec la coriandre (optionnel : 1 une pincée de piment doux), c\'est prêt !', 1, 1),
(12, 'Quiche tomate courgette & chèvre', 'Luc M.', '2023-07-18', 'Quiche-tomate-courgette-chèvre.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '1 Courgette, \r\n3 Tomates, \r\n3 Oeufs, \r\n12cl Lait,\r\n150gr fromage de Chèvre,\r\n1 pâte feuilletée,\r\n12cl crème liquide,\r\n1 càc Herbes de Provence', 'Four, \r\nPlat à tarte, \r\nFouet', 'étape 1 : Préchauffez le four à 180°C. Coupez les extrémités des courgettes puis coupez-les en dés, \r\nétape 2 : Coupez les tomates en quartiers, \r\nétape 3 : Placez la pâte dans votre moule à tarte et piquez-la à l\'aide d\'une fourchette. Une fois le four chaud, faites pré-cuire votre pâte pendant 5 minutes à 180°C., \r\nétape 4 : Dans un récipient, ajoutez : la crème, le lait, les œufs, sel, poivre et fouettez le tout énergiquement., \r\nétape 5 : Une fois la pâte pré-cuite, sortez-la du four et répartissez les courgettes et les tomates dans le fond., \r\nétape 6 : Versez l\'appareil à quiche par dessus les légumes. Répartissez la bûche de chèvre préalablement découpée en rondelles sur le dessus.,\r\nétape 7 : Parsemez d\'herbes de Provence, salez, poivrez et enfournez votre quiche pendant 45 minutes à 180°C. Laissez reposer 10 minutes avant de déguster, c\'est prêt ! À accompagner d\'une salade verte.', 1, 1),
(13, 'Salade saumon mangue avocat', 'Marion V.', '2023-07-16', 'Salade-saumon-mangue-avocat.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '2 tran. Saumon (fumé), \r\n1/4 Mangue, \r\n2 poignées Épinard, \r\n1cm Gingembre,\r\n1 càs Sauce soja salée,\r\n1/2 Avocat,\r\n1/2 Citron vert,\r\n1/2 càc Graines de sésame (facultatif)', 'Râpe', 'étape 1 : Dans un bol, mélangez la sauce soja avec de l\'huile d\'olive (1 cuillère à soupe d\'huile d\'olive pour 1 de soja), le gingembre râpé, le zeste et le jus de citron vert., \r\nétape 2 : Dans un saladier, ajoutez les pousses d\'épinard, la mangue, l\'avocat, le saumon fumé coupé en lamelles, puis ajoutez la sauce et les graines de sésame si vous en avez. Mélangez, dégustez !', 3, 1),
(14, 'Fraisier facile', 'Marc I.', '2023-07-13', 'Fraisier-facile.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '750gr Fraises, \n4 Oeufs, \n125gr Farine de blé, \n200gr Sucre en poudre,\n1/2 sac. Levure chimique,\n60gr Sucre glace,\n40cl Crème liquide 30%,\n250gr Mascarpone,\n4/5 bou. Basilic', 'Batteur, \r\nPapier cuisson, \r\nSpatule, \r\nTorchon, \r\nFour, \r\nMoule à manqué, \r\nCasserole, \r\nPlaques de cuisson, \r\nSaladier, \r\nPinceau', 'étape 1 : Préchauffez le four à 180°C. Préparez toutes les pesées des ingrédients pour la génoise. Beurrez puis farinez un moule à manqué. Enlevez le résidu de farine en tapotant sur le moule., \r\nétape 2 : Séparez les blancs des jaunes d\\\'œufs., \r\nétape 3 : Ajoutez une pincée de sel dans les blancs d\'œufs. Fouettez les blancs en neige à l\'aide d\'un batteur., \r\nétape 4 : Quand ils commencent à être fermes, ajoutez 125g de sucre en deux fois et battez à chaque ajout. Vous devez obtenir une meringue lisse., \r\nétape 5 : Baissez la vitesse du batteur puis ajoutez les jaunes d\'œufs un par un. Fouettez à chaque ajout., \r\nétape 6 : Ajoutez la farine et la levure tamisées. Mélangez délicatement à l\'aide d\'une spatule.,\r\nétape 7 : Versez la préparation de la génoise dans le moule préalablement beurré et fariné. Enfournez pendant 22 minutes à 180°C.,\r\nétape 8 : Déposez le saladier prévu pour monter la chantilly au congélateur (cela aidera à bien faire monter la chantilly).,\r\nétape 9 : Pendant ce temps, lavez, équeutez et coupez les fraises en quartiers. Mettez de côté 3-4 fraises coupées pour réaliser le sirop.,\r\nétape 10 : Préparez la chantilly. Dans le saladier froid, ajoutez la crème et le mascarpone. Fouettez jusqu\'à l\'obtention d\'une crème chantilly.,\r\nétape 11 : Ajoutez ensuite le sucre glace. Fouettez à nouveau puis réservez au frais., \r\nétape 12 : Sortez le biscuit du four et démoulez-le sur une grille. Laissez-le refroidir quelques minutes puis coupez-le en deux dans le sens de la largeur pour obtenir deux disques de biscuit de la même épaisseur., \r\nétape 13 : Préparez le sirop. Pour un gâteau, mettez dans une petite casserole les fraises mises de côté, 75g de sucre et 10cl d\'eau. Portez le tout à ébullition 3 minutes sur feu moyen., \r\nétape 14 : Au bout de 3 minutes, retirez le sirop du feu puis écrasez les fraises à l\'aide d\'une fourchette pour qu\'elles soient légèrement en purée., \r\nétape 15 : À l\'aide d\'un pinceau, étalez le sirop généreusement sur les deux faces du biscuit., \r\nétape 16 : Étalez ensuite 1/3 de la chantilly sur la première face du biscuit puis ajoutez la moitié des quartiers de fraises (gardez-en pour le dessus !),\r\nétape 17 : Recouvrez les quartiers de fraises d\\\'un autre tiers de chantilly (gardez-en pour le dessus du fraisier !). Enfin, déposez l\'autre biscuit par-dessus.,\r\nétape 18 : Étalez le reste de la chantilly sur le biscuit.,\r\nétape 19 : Décorez le dessus de votre fraisier avec le reste des fraises et quelques feuilles de basilic si vous en avez. C\'est prêt !', 4, 1),
(15, 'Curry de chou-fleur aux lentilles', 'Camille D.', '2023-08-17', 'curry_lentilles_choux-fleur.png', 'curry-lentilles-chou-fleur2.png', 'curry-lentilles-chou-fleur.png', 'curry-lentilles-chou-fleur3.png', '60g lentilles corail, \r\n1/4 chou-fleur, \r\n7cl lait de coco, \r\n1 càs concentré de tomate, \r\n1/4 oignon jaune, \r\n1 càs curry, \r\n70g riz', 'Casserole, \r\nplaques de cuisson, \r\npassoire', 'étape 1 : Faites cuire le riz selon les instructions du paquet (soit environ 10 minutes dans une casserole d\'eau bouillante salée). Égouttez et réservez au chaud.\r\nétape 2 : En parallèle, épluchez et coupez l\'oignon en petits morceaux. \r\nétape 3 : Détaillez le chou-fleur en petites fleurettes puis lavez-les. \r\nétape 4 : Faites chauffer un filet d\'huile d\'olive dans une casserole. Ajoutez l\'oignon, le concentré de tomate et le curry (ajoutez un peu de cumin si vous le souhaitez). Faites revenir le tout sur feu moyen en mélangeant pendant 2 minutes. \r\nétape 5 : Versez les lentilles corail, ajoutez le chou-fleur et versez 20cl d\'eau par portion. Salez et poivrez. \r\nétape 6 : Ajoutez le lait de coco. Mélangez et laissez cuire à couvert sur feu moyen pendant 25 minutes en remuant de temps en temps. \r\nétape 7 : Servez avec le riz, ajoutez quelques feuilles de persil si vous le souhaitez et ré-assaisonnez selon vos goûts, c\'est prêt !', 2, 1)

- Table "users" :
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(250) NOT NULL,
  `passwordHash` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;

- Contenu de la table "users" :
INSERT INTO `users` (`id`, `mail`, `passwordHash`) VALUES
(1, 'test@test.com', '0000')

## Evolution futur : 
- Créer un espace client avec la possibilité d'enregistrer les recette favorites
- Système de notation (sur 5) pour les recettes
- rôles (admin / client / contributeurs)