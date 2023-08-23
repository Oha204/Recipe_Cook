<?php

require_once __DIR__ . '/../classes/Recette.php';

$categorie = [
    [
        'name' => 'Entrée',
        'img' => 'assets/icons/entree.png'
    ],
    [
        'name' => 'Plats chaud',
        'img' => 'assets/icons/plat_chaud.png'
    ],
    [
        'name' => 'Plats froid',
        'img' => 'assets/icons/plat_froid.png'
    ],
    [
        'name' =>  'Dessert',
        'img' => 'assets/icons/dessert.png'
    ],
];

$recipesObjects = [
    new Recette(
        1,
        'Curry de chou-fleur aux lentilles',
        'Camille D.',
        '17/08/2023',
        'curry_lentilles_choux-fleur.png',
        [1],
        [
        '60g lentilles corail',
        '1/4 chou-fleur',
        '7cl lait de coco',
        '1 càs concentré de tomate',
        '1/4 oignon jaune',
        '1 càs curry',
        '70g riz'
        ],
        ['Casserole', 'plaques de cuisson', 'passoire'],
        [
        'étape 1' => 'Faites cuire le riz selon les instructions du paquet (soit environ 10 minutes dans une casserole d\'eau bouillante salée). Égouttez et réservez au chaud.',
        'étape 2' => 'En parallèle, épluchez et coupez l\'oignon en petits morceaux.',
        'étape 3' => 'Détaillez le chou-fleur en petites fleurettes puis lavez-les.',
        'étape 4' => 'Faites chauffer un filet d\'huile d\'olive dans une casserole. Ajoutez l\'oignon, le concentré de tomate et le curry (ajoutez un peu de cumin si vous le souhaitez). Faites revenir le tout sur feu moyen en mélangeant pendant 2 minutes.',
        'étape 5' => 'Versez les lentilles corail, ajoutez le chou-fleur et versez 20cl d\'eau par portion. Salez et poivrez.',
        'étape 6' => 'Ajoutez le lait de coco. Mélangez et laissez cuire à couvert sur feu moyen pendant 25 minutes en remuant de temps en temps.',
        'étape 7' => 'Servez avec le riz, ajoutez quelques feuilles de persil si vous le souhaitez et ré-assaisonnez selon vos goûts, c\'est prêt !  '
        ]
    ),


    new Recette ( 
        2, 
        'Saumon mariné aux épices & citron vert', 
        'Léo A.', 
        '15/08/2023',
        'saumon_marine_epice-citron-vert.png',
        [1], 
        [
            1 => '1 pinc. piment d\'espelette', 
            2 => '1 càs miel', 
            3 => '1/4 citron vert', 
            4 =>'1 saumon', 
            5 => '1/4 oignon rouge', 
            6 => '1 poivron' , 
            7 => '70g riz'
        ],
        [ 'Four', 'casserole', 'plaques de cuisson', 'plat à gratin'],
        [
            'étape 1' => 'Préchauffez le four à 220°C. Dans un bol, préparez la marinade en mélangeant : le jus de citron, le miel, le piment d\'Espelette, du sel, du poivre et un bon filet d\'huile d\'olive.', 
            'étape 2' => 'Arrosez le saumon avec la marinade.', 
            'étape 3' => 'Pelez l\'oignon et coupez-le en gros morceaux.', 
            'étape 4' =>'Lavez puis coupez les poivrons en retirant le coeur avec les pépins. Coupez-les en gros morceaux.', 
            'étape 5' => 'Sur une plaque recouverte de papier cuisson, ajoutez le saumon mariné, l\'oignon et les poivrons. Assaisonnez avec la marinade restante, du sel et du poivre. Enfournez 15 à 20 minutes à 220°C. Pour un saumon croustillant, mettez le four en mode grill pendant 2 minutes en fin de cuisson.', 
            'étape 6' => 'Pendant ce temps, faites cuire le riz selon les instructions du paquet. En fin de cuisson, égouttez-le.' , 
            'étape 7' => 'Sortez le plat du four et servez le saumon avec les légumes grillés et le riz. Arrosez le saumon de jus de citron. C\'est prêt !'
        ]
    ),

    new Recette ( 
        3, 
        'Bœuf & légumes sautés au pesto', 
        'Sophia Z.', 
        '13/08/2023',
        'boeuf-legume-saute-pesto.png',
        [1], 
        [
            1 => '1 boeuf', 
            2 => '1 càs sauce pesto', 
            3 => '100g tomate cerise', 
            4 =>'100g courgette', 
            5 => '1/2 poivron rouge', 
            6 => '1/4 gou. ail'
        ],
        ['plaques de cuisson', 'poêle'],
        [
            'étape 1' => 'Lavez les légumes. Coupez les courgettes en demi-rondelles de 0,5 cm environ.', 
            'étape 2' => 'Coupez les poivrons en gros cubes.', 
            'étape 3' => 'Dans une grande poêle, ajoutez un filet d\'huile d\'olive, les légumes, sel, et poivre. Râpez ou émincez l\'ail et faites revenir les légumes pendant 10 minutes à feu fort en remuant.', 
            'étape 4' =>'Après 10 minutes de cuisson, ajoutez le bœuf avec un filet d\'huile d\'olive et faites le cuire 2 minutes de chaque côté pour une cuisson saignante.', 
            'étape 5' => 'Éteignez le feu, ajoutez le pesto dans la poêle et mélangez.', 
            'étape 6' => 'Pendant ce temps, faites cuire le riz selon les instructions du paquet. En fin de cuisson, égouttez-le.' , 
            'étape 7' => 'Coupez le bœuf en lamelles et servez-le avec les légumes au pesto. C\'est prêt !'
        ]
    ),

    new Recette ( 
        4, 
        'Cheesecake aux framboises', 
        'Bob Y.', 
        '10/08/2023',
        'cheesecake-framboises.png',
        [3], 
        [
            1 => '70g beurre', 
            2 => '750g fromage frais', 
            3 => '120g sucre', 
            4 => '2 sac. sucre vanillé', 
            5 => '5 oeufs', 
            6 => '13cl crème liquide',
            7 => '200g framboises', 
            8 => '175g palet breton'
        ],
        ['Four', 'moule à manqué', 'papier cuisson'],
        [
            'étape 1' => 'Cette recette nécessite un temps de repos de 2h minimum. Préchauffez le four à 180°C. Ajoutez les biscuits dans un grand récipient et écrasez-les à l\'aide du fond d\'un verre.', 
            'étape 2' => 'Faites fondre le beurre au micro-ondes ou dans une petite casserole. Mélangez les biscuits émiettés et le beurre fondu avec une pincée de sel.', 
            'étape 3' => 'Dans un moule à manqué de préférence avec bords amovibles (sinon placez une feuille de papier sulfurisé dans le fond), versez le mélange biscuits/ beurre et tassez-le à l\'aide du dos d\'une cuillère. Enfournez à 180°C pendant 10 minutes.', 
            'étape 4' =>'Pendant ce temps, dans un saladier réalisez l\'appareil à cheesecake en mélangeant : le fromage frais, le sucre, le sucre vanillé, 3 œufs entiers, 2 jaunes d\'œufs et la crème liquide, jusqu\'à l\'obtention d\'une texture homogène.', 
            'étape 5' => 'Une fois le biscuit précuit, sortez-le du four et montez la température du four à 200°C. ', 
            'étape 6' => 'Versez l\'appareil à cheesecake sur le biscuit et ré-enfournez pendant 15 minutes à 200°C. Au bout des 15 minutes, baissez à 100°C et poursuivez la cuisson pendant 1 heure environ.' , 
            'étape 7' => 'En fin de cuisson, éteignez le four et laissez le cheesecake refroidir dans le four. Réservez ensuite au frais au moins 2 heures ou jusqu’au service.',
            'étape 8' => 'Démoulez le cheesecake et décorez-le avec les framboises. C\'est prêt !'
        ]
    ),

    new Recette ( 
        5, 
        'Gratin de gnocchis au brocoli', 
        'Coline M.', 
        '08/08/2023',
        'gratin-gnocchi-brocoli.png',
        [1], 
        [
            1 => '1/4 brocoli', 
            2 => '125g gnocchi', 
            3 => '50g ricotta', 
            4 => '1 càs parmesan', 
            5 => '1 poignée épinard', 
            6 => '1/4 gou. ail',
            7 => '1/8 citron'
        ],
        ['Four', 'Plaque de cuisson', 'Poêle'],
        [
            'étape 1' => 'Préchauffez le four à 200°C. Lavez puis découpez les brocolis en sommités. (Pour des brocolis plus tendres, faites-les pré-cuire à la vapeur 5 minutes).', 
            'étape 2' => 'Émincez l\'ail finement.', 
            'étape 3' => 'Dans une poêle, ajoutez un filet d\'huile d\'olive, l\'ail, les brocolis et les gnocchis. Faites revenir pendant 2 minutes à feu vif. ', 
            'étape 4' =>'Ajoutez un filet d\'eau et cuire à couvert pendant 5 minutes à feu moyen. ', 
            'étape 5' => 'Assaisonnez et ajoutez les épinards et cuire 2 minutes de plus. ', 
            'étape 6' => 'Une fois la cuisson terminée, ajoutez la ricotta, salez, poivrez, mélangez.' , 
            'étape 7' => 'Ajoutez le tout dans un plat allant au four, saupoudrez de parmesan et enfournez pendant 10 à 15 minutes. Le dessus doit être doré.',
            'étape 8' => '(Optionnel : ajoutez un peu de zeste de citron jaune au moment de servir). C\'est prêt !'
        ]
    ),

    new Recette ( 
        6, 
        'Aubergine rôtie au curcuma', 
        'Zoé G.', 
        '06/08/2023',
        'aubergine-rôtie-curcuma.png',
        [1], 
        [
            1 => '1 aubergine', 
            2 => '92g yaourt végétal', 
            3 => '170g pois chiches', 
            4 => '1/4 càs curcuma'
        ],
        ['Four', 'Papier cuisson', 'Moule à manqué'],
        [
            'étape 1' => 'Préchauffez le four à 200°C. Lavez puis coupez les aubergines en 2 dans la longueur. ', 
            'étape 2' => 'À l\'aide de la pointe d\'un couteau, réalisez des croisillons dans la chair sans percer la peau.', 
            'étape 3' => 'Mélangez 2 cu. à soupe d\'huile d\'olive par personne avec le curcuma.Dans une poêle, ajoutez un filet d\'huile d\'olive, l\'ail, les brocolis et les gnocchis. Faites revenir pendant 2 minutes à feu vif. ', 
            'étape 4' => 'Placez les aubergines sur une plaque de cuisson recouverte de papier sulfurisé et badigeonnez-les avec une partie de l\'huile au curcuma. ', 
            'étape 5' => 'Salez, poivrez puis enfournez 30 minutes à 200°C.', 
            'étape 6' => 'Pendant ce temps, rincez puis égouttez les pois chiches et mélangez-les avec le reste de l\'huile au curcuma, sel, poivre.' , 
            'étape 7' => 'Au bout de 15 minutes de cuisson des aubergines, ajoutez les pois chiches sur la plaque de cuisson et ré-enfournez jusqu\'à la fin de la cuisson des aubergines.',
            'étape 8' => 'Une fois les légumes cuits, servez les aubergines avec le yaourt, les pois chiches, quelques feuilles de coriandre, sel, poivre, c\'est prêt !'
        ]
    ),

    new Recette ( 
        7, 
        'Crème brûlée', 
        'Adrien S.', 
        '03/08/2023',
        'creme-brulee.png',
        [3], 
        [
            1 => '50cl crème liquide', 
            2 => '100g sucre', 
            3 => '6 oeufs', 
            4 => '1 gou. vanille',
            5 => '8 càs sucre de canne'
        ],
        ['Four', 'plaques de cuisson', 'fouet', 'ramequin', 'plat à gratin', 'chalumeau'],
        [
            'étape 1' => 'Préchauffez le four à 160°C. Égrainez la gousse de vanille en la coupant en deux dans le sens de la longueur puis en glissant la lame du couteau tout en raclant les grains. Gardez le reste de la gousse.', 
            'étape 2' => 'Faites chauffer la crème dans une casserole sur feu doux et ajoutez les grains de vanille ainsi que la gousse. Laissez infuser le tout environ 5 minutes. ', 
            'étape 3' => 'Pendant ce temps, séparez les blancs des jaunes d\'œufs et gardez les jaunes. ', 
            'étape 4' => 'Dans un saladier, fouettez les jaunes avec le sucre en poudre jusqu\'à ce que le mélange devienne mousseux. ', 
            'étape 5' => 'Enlevez la gousse de vanille de la crème à l\'aide d\'une cuillère et versez progressivement la crème tiède sur le mélange jaune/sucre tout en fouettant.', 
            'étape 6' => 'Versez la crème dans des ramequins et enfournez pendant 35 minutes à 160°C au bain marie. ' , 
            'étape 7' => 'Sortez du four et mettez les crèmes au frigo 1 heure minimum. ',
            'étape 8' => 'Avant de servir, parsemez le dessus des crèmes brûlées avec le sucre de canne (soit 1 cuillère à soupe par portion).',
            'étape 9' => 'Munissez vous d\'un chalumeau et faites caraméliser le sucre sur le dessus. Servez, c\'est prêt !'
        ]
    ),

    new Recette ( 
        8, 
        'Cookie géant', 
        'Margot N.', 
        '01/08/2023',
        'cookie-geant.png',
        [3], 
        [
            1 => '200g beurre', 
            2 => '350g farine de blé', 
            3 => '120g sucre de canne', 
            4 => '4 oeufs',
            5 => '200g de chocolat',
            6 => '1 sac. levure chimique'
        ],
        ['Four', 'casserole', 'fouet', 'plaque de cuisson', 'poêle'],
        [
            'étape 1' => 'Hachez grossièrement le chocolat. Mettez 5 carrés de chocolat de côté. ', 
            'étape 2' => 'Faites fondre le beurre à la casserole ou au micro-ondes. Versez le beurre dans un saladier et ajoutez le sucre roux. Fouettez le mélange. ', 
            'étape 3' => 'Ajoutez les œufs tout en fouettant. Ajoutez une pincée de sel. ', 
            'étape 4' => 'Ajoutez la farine, la levure et mélangez à l\'aide d\'une cuillère en bois. ', 
            'étape 5' => 'Ajoutez le chocolat haché et mélangez. Placez au frais minimum 30 minutes. ', 
            'étape 6' => 'Préchauffez le four à 180°C. Beurrez votre moule (ici, on utilise une poêle allant au four ça marche très bien aussi !). ' , 
            'étape 7' => 'Étalez la pâte à l\'aide de vos mains sur toute la surface du moule et déposez les carrés de chocolat mis de côté sur le dessus en les enfonçant légèrement. ',
            'étape 8' => 'Enfournez pour 35-40 minutes à 180°C. Le dessus du cookie doit être doré. Parsemez de fleur de sel avant de déguster, c\'est prêt ! '
        ]
    ),

    new Recette ( 
        9, 
        'Aubergine braisée au porc', 
        'Justin X.', 
        '28/07/2023',
        'aubergine-braisee-porc.png',
        [1], 
        [
            1 => '150g aubergine', 
            2 => '60g chair à saucisse', 
            3 => '1 gou. ail', 
            4 => '5g gingembre',
            5 => '1 càs sucre',
            6 => '1 càs sauce soja salée',
            7 => '70g riz'
        ],
        ['plaque de cuisson', 'casserole', 'poêle', 'râpe'],
        [
            'étape 1' => 'Rincez les aubergines, coupez-les en morceaux réguliers. Salez et faites dégorger dans une passoire. ', 
            'étape 2' => 'Pendant ce temps, épluchez puis râpez l\'ail et le gingembre. Réservez. ', 
            'étape 3' => 'Si vous en avez, hachez la ciboulette à l\'aide d\'un couteau. ', 
            'étape 4' => 'Mélangez le sucre et la sauce soja.', 
            'étape 5' => 'Essuyez les aubergines avec un torchon ou un papier absorbant. ', 
            'étape 6' => 'Chauffez un filet d\'huile dans une grande poêle. Faites dorer les aubergines pendant environ 5 minutes. Réservez sur du papier absorbant.' , 
            'étape 7' => 'Dans la même poêle, remettez un tout petit peu d’huile et faites dorer l’ail et le gingembre. Lorsqu’ils commencent à colorer, ajoutez la chair à saucisse. Mélangez pour détacher les morceaux.',
            'étape 8' => 'Ajoutez la sauce, poivrez généreusement et remuez. Remettez les aubergines et 3cl d’eau par portion. Baissez le feu et laissez cuire environ 10 minutes.',
            'étape 9' => 'Pendant ce temps faites cuire le riz dans une casserole d\'eau bouillante salée selon les indications du paquet soit environ 10 minutes.',
            'étape 10' => 'Après 10 minutes, l’eau doit être évaporée et les aubergines tendres. Piquez avec la pointe d’un couteau pour vérifier.',
            'étape 11' => 'Hors du feu ajoutez la ciboulette sur les aubergines si vous en avez, et égouttez le riz. Servez bien chaud, c\'est prêt ! '
        ]
    ),

    new Recette ( 
        10, 
        'Palet veggie, légumes rôtis & tzatziki', 
        'Domitille L.',
        '25/07/2023', 
        'palet-veggie-rostis-tzatziki.png',
        [1], 
        [
            1 => '150g patate douce', 
            2 => '1 courgette', 
            3 => '1/4 oignon rouge', 
            4 => '100g de galette de legume',
            5 => '50g tzatziki',
            6 => '1 pinc. thym'
        ],
        ['four'],
        [
            'étape 1' => 'Préchauffez le four à 200°C. Épluchez les patates douces, puis coupez-les en petits cubes. ', 
            'étape 2' => 'Lavez puis coupez les courgettes en deux dans le sens de la longueur, puis en demi lunes.', 
            'étape 3' => 'Épluchez puis coupez l\'oignon rouge en quartiers.', 
            'étape 4' => 'Sur une plaque recouverte de papier cuisson, ajoutez les patates douces, les courgettes et l\'oignon rouge. Arrosez d\'un bon filet d\'huile d\'olive. Salez, poivrez et ajoutez du thym. Mélangez le tout. Enfournez 15 minutes à 200°C.', 
            'étape 5' => 'Au bout des 15 minutes, ajoutez les galettes de légumes sur la plaque et enfournez de nouveau 15 minutes à 200°C. ', 
            'étape 6' => 'Dans une assiette, servez les légumes rôtis avec les galettes veggie. Ajoutez le tzatziki et quelques feuilles de persil si vous en avez. C\'est prêt !'
        ]
        ),

        new Recette ( 
            11, 
            'Rouleaux de printemps à la crevette', 
            'Camille C.',
            '23/07/2023', 
            'Rouleaux_printemps_crevette.png',
            [2], 
            [
                1 => '2 càs Sauce soja salée', 
                2 => '5 Feuille de riz', 
                3 => '60gr Vermicelles de riz', 
                4 => '60gr Crevette (cuite)',
                5 => '80g Carotte',
                6 => '1/50 bou. Menthe (feuilles)'
            ],
            ['Plaques de cuisson', 'Économe', 'Passoire', 'Casserole'],
            [
                'étape 1' => 'Dans une casserole d\'eau bouillante, faites cuire les vermicelles de riz selon les instructions du paquet.', 
                'étape 2' => 'Épluchez les carottes et râpez-les à l\'aide d\'une râpe ou d\'un économe.', 
                'étape 3' => 'Décortiquez les crevettes si elles ne le sont pas déja. Réservez. ', 
                'étape 4' => 'Une fois les vermicelles cuits, égouttez-les et rincez-les à l\'eau froide. Mettez-les de côté.', 
                'étape 5' => 'Pour rouler vos rouleaux de printemps, vous aurez besoin d\'une assiette (légèrement creuse) remplie d\'eau chaude (1 cm suffit) et assez grande pour accueillir les feuilles de riz. Prêt ?', 
                'étape 6' => 'Placez 1 feuille de riz dans l\'eau chaude, immergez-la totalement et attendez jusqu\'à ce qu\'elle soit entièrement molle. Placez-la délicatement à plat sur le plan de travail pour ne pas la déchirer. Mettez aussitôt 1 seconde feuille de riz dans l\'eau. ',
                'étape 7' => 'Garnissez votre feuille de riz avec : 2 ou 3 feuilles de menthe, une poignée de carottes râpées, 2 ou 3 crevettes et 1 petite poignée de vermicelles.',
                'étape 8' => 'Repliez la feuille : repliez les bords vers l\'intérieur, enroulez délicatement la garniture (jusqu\'à la moitié de la feuille environ) puis finissez de rouler le tout, voilà !',
                'étape 9' => 'Recommencez autant de fois que vous avez de feuilles',
                'étape 10' => 'Servez les rouleaux de printemps avec de la sauce soja pour les tremper dedans ! C\'est prêt !'
            ]
        ),

        new Recette ( 
            12, 
            'Rouleaux de printemps à la crevette', 
            'Victoire Q.',
            '20/07/2023', 
            'Salade_concombre_cacahuetes.png',
            [0], 
            [
                1 => '250gr Concombre', 
                2 => '15gr Cacahuète', 
                3 => '1/10 bou. Coriandre', 
                4 => '1/4 Oignon rouge',
                5 => '1 pinc. Cumin',
                6 => '1/4 Citron jaune'
            ],
            ['Plaques de cuisson', 'Poêle'],
            [
                'étape 1' => 'Concassez grossièrement les cacahuètes.', 
                'étape 2' => 'Lavez, puis hachez la coriandre..', 
                'étape 3' => 'Dans une poêle chaude, ajoutez 1cu. à soupe d\'huile/personne (colza/tournesol/huile d\'olive/etc) : les graines de cumin (ou le cumin) et les cacahuètes.', 
                'étape 4' => 'Faire revenir pendant 2min en remuant régulièrement, jusqu\'à ce que les cacahuètes soient dorées.', 
                'étape 5' => 'Lavez puis coupez le concombre en fines tranches.', 
                'étape 6' => 'Coupez les oignons en 2 puis en fines lamelles.',
                'étape 7' => 'Dans un récipient ajoutez : le concombre, les oignons, le mélange cacahuète-cumin, le jus de citron, salez, poivrez, mélangez.',
                'étape 8' => 'Servir avec la coriandre (optionnel : 1 une pincée de piment doux), c\'est prêt !'
            ]
        ),

        new Recette ( 
            13, 
            'Quiche tomate courgette & chèvre', 
            'Luc M.',
            '18/07/2023', 
            'Quiche-tomate-courgette-chèvre.png',
            [0], 
            [
                1 => '1 Courgette', 
                2 => '3 Tomates', 
                3 => '3 Oeufs', 
                4 => '12cl Lait',
                5 => '150gr fromage de Chèvre',
                6 => '1 pâte feuilletée',
                7 => '12cl crème liquide',
                8 => '1 càc Herbes de Provence'
            ],
            ['Four', 'Plat à tarte', 'Fouet'],
            [
                'étape 1' => 'Préchauffez le four à 180°C. Coupez les extrémités des courgettes puis coupez-les en dés', 
                'étape 2' => 'Coupez les tomates en quartiers', 
                'étape 3' => 'Placez la pâte dans votre moule à tarte et piquez-la à l\'aide d\'une fourchette. Une fois le four chaud, faites pré-cuire votre pâte pendant 5 minutes à 180°C.', 
                'étape 4' => 'Dans un récipient, ajoutez : la crème, le lait, les œufs, sel, poivre et fouettez le tout énergiquement.', 
                'étape 5' => 'Une fois la pâte pré-cuite, sortez-la du four et répartissez les courgettes et les tomates dans le fond.', 
                'étape 6' => 'Versez l\'appareil à quiche par dessus les légumes. Répartissez la bûche de chèvre préalablement découpée en rondelles sur le dessus.',
                'étape 7' => 'Parsemez d\'herbes de Provence, salez, poivrez et enfournez votre quiche pendant 45 minutes à 180°C. Laissez reposer 10 minutes avant de déguster, c\'est prêt ! À accompagner d\'une salade verte.'
            ]
        ),

        new Recette ( 
            14, 
            'Salade saumon mangue avocat', 
            'Marion V.',
            '16/07/2023', 
            'Salade-saumon-mangue-avocat.png',
            [2], 
            [
                1 => '2 tran. Saumon (fumé)', 
                2 => '1/4 Mangue', 
                3 => '2 poignées Épinard', 
                4 => '1cm Gingembre',
                5 => '1 càs Sauce soja salée',
                6 => '1/2 Avocat',
                7 => '1/2 Citron vert',
                8 => '1/2 càc Graines de sésame (facultatif)'
            ],
            ['Râpe'],
            [
                'étape 1' => 'Dans un bol, mélangez la sauce soja avec de l\'huile d\'olive (1 cuillère à soupe d\'huile d\'olive pour 1 de soja), le gingembre râpé, le zeste et le jus de citron vert.', 
                'étape 2' => 'Dans un saladier, ajoutez les pousses d\'épinard, la mangue, l\'avocat, le saumon fumé coupé en lamelles, puis ajoutez la sauce et les graines de sésame si vous en avez. Mélangez, dégustez !'
            ]
        ),

        new Recette ( 
            15, 
            'Fraisier facile', 
            'Marc I.',
            '13/07/2023', 
            'Fraisier-facile.png',
            [3], 
            [
                1 => '750gr Fraises', 
                2 => '4 Oeufs', 
                3 => '125gr Farine de blé', 
                4 => '200gr Sucre en poudre',
                5 => '1/2 sac. Levure chimique',
                6 => '60gr Sucre glace',
                7 => '40cl Crème liquide 30%',
                8 => '250gr Mascarpone',
                9 => '4/5 bou. Basilic'
            ],
            ['Batteur', 'Papier cuisson', 'Spatule', 'Torchon', 'Four', 'Moule à manqué', 'Casserole', 'Plaques de cuisson', 'Saladier', 'Pinceau'],
            [
                'étape 1' => 'Préchauffez le four à 180°C. Préparez toutes les pesées des ingrédients pour la génoise. Beurrez puis farinez un moule à manqué. Enlevez le résidu de farine en tapotant sur le moule. ', 
                'étape 2' => 'Séparez les blancs des jaunes d\'œufs.', 
                'étape 3' => 'Ajoutez une pincée de sel dans les blancs d\'œufs. Fouettez les blancs en neige à l\'aide d\'un batteur. ', 
                'étape 4' => 'Quand ils commencent à être fermes, ajoutez 125g de sucre en deux fois et battez à chaque ajout. Vous devez obtenir une meringue lisse.', 
                'étape 5' => 'Baissez la vitesse du batteur puis ajoutez les jaunes d\'œufs un par un. Fouettez à chaque ajout.' , 
                'étape 6' => 'Ajoutez la farine et la levure tamisées. Mélangez délicatement à l\'aide d\'une spatule.',
                'étape 7' => 'Versez la préparation de la génoise dans le moule préalablement beurré et fariné. Enfournez pendant 22 minutes à 180°C.',
                'étape 8' => 'Déposez le saladier prévu pour monter la chantilly au congélateur (cela aidera à bien faire monter la chantilly).',
                'étape 9' => 'Pendant ce temps, lavez, équeutez et coupez les fraises en quartiers. Mettez de côté 3-4 fraises coupées pour réaliser le sirop.',
                'étape 10' => 'Préparez la chantilly. Dans le saladier froid, ajoutez la crème et le mascarpone. Fouettez jusqu\'à l\'obtention d\'une crème chantilly.',
                'étape 11' => 'Ajoutez ensuite le sucre glace. Fouettez à nouveau puis réservez au frais.', 
                'étape 12' => 'Sortez le biscuit du four et démoulez-le sur une grille. Laissez-le refroidir quelques minutes puis coupez-le en deux dans le sens de la largeur pour obtenir deux disques de biscuit de la même épaisseur.', 
                'étape 13' => 'Préparez le sirop. Pour un gâteau, mettez dans une petite casserole les fraises mises de côté, 75g de sucre et 10cl d\'eau. Portez le tout à ébullition 3 minutes sur feu moyen.', 
                'étape 14' => 'Au bout de 3 minutes, retirez le sirop du feu puis écrasez les fraises à l\'aide d\'une fourchette pour qu\'elles soient légèrement en purée. ', 
                'étape 15' => 'À l\'aide d\'un pinceau, étalez le sirop généreusement sur les deux faces du biscuit.', 
                'étape 16' => 'Étalez ensuite 1/3 de la chantilly sur la première face du biscuit puis ajoutez la moitié des quartiers de fraises (gardez-en pour le dessus !)',
                'étape 17' => 'Recouvrez les quartiers de fraises d\'un autre tiers de chantilly (gardez-en pour le dessus du fraisier !). Enfin, déposez l\'autre biscuit par-dessus. ',
                'étape 18' => 'Étalez le reste de la chantilly sur le biscuit. ',
                'étape 19' => 'Décorez le dessus de votre fraisier avec le reste des fraises et quelques feuilles de basilic si vous en avez. C\'est prêt !',
            ]
        ),
];