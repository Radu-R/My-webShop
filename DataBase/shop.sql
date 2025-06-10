-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 22 mai 2025 à 10:41
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(32) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `date`, `status`) VALUES
(1, 8, '0000-00-00 00:00:00', 'sent'),
(2, 8, '0000-00-00 00:00:00', 'pending'),
(3, 8, '0000-00-00 00:00:00', 'pending'),
(4, 12, '2025-05-15 18:57:05', 'pending'),
(9, 8, '2025-05-20 11:55:14', 'pending'),
(10, 8, '2025-05-20 11:55:34', 'pending'),
(11, 13, '2025-05-20 12:03:29', 'pending'),
(12, 8, '2025-05-20 12:11:51', 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

CREATE TABLE `order_details` (
  `detailsID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `order_details`
--

INSERT INTO `order_details` (`detailsID`, `orderID`, `productID`, `amount`) VALUES
(1, 1, 3, 2),
(2, 1, 2, 1),
(3, 1, 11, 1),
(4, 2, 10, 3),
(5, 2, 1, 1),
(6, 3, 6, 1),
(7, 4, 6, 1),
(8, 4, 9, 1),
(10, 9, 3, 1),
(11, 10, 12, 1),
(12, 11, 10, 1),
(13, 11, 14, 2),
(14, 12, 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`productID`, `name`, `description`, `price`, `date`, `deleted`) VALUES
(1, 'Smart Watch for Men Women', 'Bluetooth Call and Smart Notificationsï¼šSmart watches for men allows you to stay in touch with your family or friends anytime, anywhere, even when you\'re at the gym, outdoors, or doing other activities. You can also receive social media, Facebook, WhatsApp, and text message alerts on your wrist, so you\'ll never miss an important message or notification\r\n1.85 Inch HD Screen and DIY Dials: Smart watch features a TFT HD color screen for superior picture quality and touch sensitivity. Men\'s watches have more than 100 unique online dials to choose from, and you can also customize your dial. It can be any photo, such as family, pets, etc\r\n100 Days Standby Time and Multiple Features: Smartwatch has a built-in 1000 mAh high-capacity battery that ensures up to 20-30days of use, and about 30 days of standby time with just 3 hours of charging. The sports watch also includes weather forecast, music control, camera control, alarm, stopwatch, find phone and many other useful features. Simply download â€œFitCloudProâ€ for free from the App Store or Google Play and enjoy your smart life\r\n110+ Fitness Modes and IP68 Waterproof: The fitness tracker watch offers up to 110+ sports modes covering running, cycling, fitness and other activities to meet different users\' preferences. During exercise, it records real-time data such as heart rate, steps, calories burned, distance and activity time. This men\'s smartwatch is IP68 waterproof and can be worn during outdoor activities, rainy days and hand washing (Note: Please do not use it in shower, sauna, swimming, etc.)\r\n24-Hour Healthy Activity Tracker: Smart watches for women tracks your heart rate, stress and sleep patterns around the clock. You can also track your menstruation with menstrual cycle tracking and ovulation prediction. All data is displayed in the â€œFitCloudProâ€ app, giving you a full picture of your health. The Women\'s Watch is compatible with Android 6.0 and above and iOS 10.0 and above(No blood pressure function)', 30.00, '2025-05-15', 0),
(2, 'Bluetooth Speaker with HD Sound', '[Immersive Sound Experience & Dual Connectivity] Experience unparalleled sound quality with this wireless Bluetooth speaker\'s 2 drivers and advanced technology that delivers powerful, well-balanced sound with minimal distortion. Connect two speakers together to create an immersive stereo sound experience and fill any room with powerful sound. Perfect for gaming, music, and movie playback\r\n[Tough & Weather-Resistant] Engineered to handle rough use and adverse weather conditions, this speaker features a durable design and an IPX5 rating for protection against water splashes and spills. It\'s an ideal choice for outdoor events, and is perfect for use at parties, at the pool, on the beach, while camping or hiking, and more\r\n[Long-lasting Playtime & Extended Bluetooth Connectivity] Experience extended playtime with up to 20 hours(50% Vol and light off) per charge and extended wireless range with Bluetooth 5.3, reaching up to 33 feet from your device. The multicolor lights on the speaker can also be turned off with a simple button press to save the battery and adapt to your needs. Keep in mind that the actual playtime can vary depending on volume level, audio content, and usage\r\n[Vibrant Light Effects] Bring a new level of excitement to your party with the dynamic multi-color light show that syncs to the beat of the music, you can easily customize the light effects to suit your preference by simply pressing the Light button. Make any gathering more memorable with these visually stunning light effects that will elevate the atmosphere\r\n[Everything You Need] The package includes 1 waterproof Bluetooth speaker (Item Dimensions D x W x H: 7.87\"D x 2.76\"W x 2.81\"H, Weight: 1.28lb), 1 Type-C charging cable, and a quick start guide, all backed by lifetime technical support. The built-in microphone allows for hands-free phone calls and you can also play music from other devices using the AUX jack (not included). It\'s a perfect gift for music lovers and tech enthusiasts alike.', 26.99, '2025-05-19', 0),
(3, 'Html Book', 'You will learn how to create the web pages with the HTML', 50.00, '2025-05-15', 0),
(5, 'SteelSeries Apex 3 TKL RGB Gaming Keyboard', 'The compact tenkeyless design is the most popular form factor used by the pros, allowing you to position the keyboard for comfort and to maximize in-game performance.\r\nOur whisper quiet gaming switches with anti-ghosting technology for keystroke accuracy are made from durable low friction material for near silent use and guaranteed performance for over 20 million keypresses.\r\nDesigned with IP32 Water & Dust Resistant for extra durability to prevent damage from liquids and dust particles, so you can continue to play no matter what happens to your keyboard.\r\nPrismSync RGB Illumination allows you to choose from millions of colors and effects from reactive lighting to interactive lightshows that bring RGB to the next level.\r\nDedicated Multimedia Controls with a clickable volume roller and media keys allowing you to adjust brightness, rewind, skip or pause all at the touch of a button.\r\nCompatible with Windows, Mac OS X, Xbox Series S, Xbox Series X, PS4, PS5', 34.00, '2025-05-19', 0),
(6, 'Car Radio for Dodge Ram', '[Applicable Models] : Ram 1500 radio upgrade 9\'\' Android 15, For Dodge RAM 1500 2500 3500 Car Radio is designed for 2013-2018 (Only fit Manual AC) models, ensuring a perfect ram radio upgrade. Please check the year, dimensions, and shape of the center console of your vehicles before purchasing.\r\nã€Upgraded Android 15 Systemã€‘ï¼šDodge ram radio powered by Android 15 OS, 2GB RAM + 64GB ROM, offers fast performance and smooth app use. Designed for Dodge Ram 1500 2500 3500 radio upgrades, Ram radio supports split-screen multitasking, EQ tuning, backup camera, SWC, USB DVR, AUX, and RCA output.\r\nã€Wireless Apple CarPlay & Android Autoã€‘ï¼šDodge Ram 1500 radio supports wireless Apple CarPlay and Android Auto. Connect your phone via WiFi and Bluetooth to access apps like navigation, calls, music, and messages directly on the screen. Enjoy hands-free control while staying focused on the road.\r\nã€Bluetooth Hands-Free & FM RDS Radioã€‘ï¼šDodge ram radio with built-in Bluetooth enables clear hands-free calling and wireless music streaming. The FM radio with RDS supports 18 preset stations for traffic, news, and entertainment. For Dodge RAM 1500 2500 3500 Radio provides an upgraded dodge ram accessories experience.\r\n[GPS Navigation & 5G WiFi ] : Dodge ram 1500 radio upgrade supports offline GPS maps and provides online navigation when connected to WiFi. You can download, update, and remove apps such as Google Maps, YouTube TK directly from the app store, making your Ram Car radios infotainment system more versatile.\r\n[Ram Car Radio-IPS Touchscreen ] : 2014 ram 1500 radio capacitive Touchscreen screen, faster response, richer colors, wider visual angle.\r\n[Plug & Play]: Designed for Dodge RAM 1500 2500 3500 (2013-2018) with a 7x4\" head unit, 9x5.11\" panel. Plug-and-play installation, no extra wiring or brackets needed.\r\nã€Professional Wiring Harness & Free Backup Cameraã€‘ï¼šRam radio upgrade includes power cable, RCA, reverse input, USB, and a free HD backup camera. Radio supports FM, Bluetooth, navigation, steering wheel controls, mirror link, subwoofer, and 240W audio outputâ€”bringing a full-featured upgrade over the factory radio for a safer and smarter driving experience.\r\nã€Warm Noteã€‘: Dodge ram stereo factory setting keyword is 3368.Power output:4x60W.USB:Double USB interface.We provide car radio for Dodge Ram detailed user manual,installation instructions clear and easy. If you got questions about our products? Just drop us a messageâ€”we\'d love to help!', 139.99, '2025-05-19', 0),
(7, 'Razer BlackShark V2 X Gaming Headset: 7.1 Surround Sound', 'ADVANCED PASSIVE NOISE CANCELLATION â€” sturdy closed earcups fully cover ears to prevent noise from leaking into the headset, with its cushions providing a closer seal for more sound isolation.\r\n7.1 SURROUND SOUND FOR POSITIONAL AUDIO â€” Outfitted with custom-tuned 50 mm drivers, capable of software-enabled surround sound. *Only available on Windows 10 64-bit\r\nTRIFORCE TITANIUM 50MM HIGH-END SOUND DRIVERS â€” With titanium-coated diaphragms for added clarity, our new, cutting-edge proprietary design divides the driver into 3 parts for the individual tuning of highs, mids, and lowsproducing brighter, clearer audio with richer highs and more powerful lows\r\nLIGHTWEIGHT DESIGN WITH BREATHABLE FOAM EAR CUSHIONS â€” At just 240g, the BlackShark V2X is engineered from the ground up for maximum comfort\r\nRAZER HYPERCLEAR CARDIOID MIC â€” Improved pickup pattern ensures more voice and less noise as it tapers off towards the micâ€™s back and sides\r\nCROSS-PLATFORM COMPATIBILITY â€” Works with PC, Mac, PS4, Xbox One, Nintendo Switch via 3.5mm jack, enjoy unfair audio advantage across almost every platform. *Xbox One stereo adapter may be required, purchase separately\r\n#1 SELLING PC GAMING PERIPHERALS BRAND IN THE U.S. â€” Source â€” Circana, Retail Tracking Service, U.S., Dollar Sales, Gaming Designed Mice, Keyboards, and PC Headsets, Jan. 2019- Dec. 2023 combined', 38.49, '2025-05-19', 0),
(8, 'LENRUE Small Portable Bluetooth Speaker with Lights', 'Ultra-Lightweight & Portable: Incredibly 0.66lb light! With a detachable lanyard. Small and portable bluetooth speakers for outdoor, workouts, or daily commutes. Take it anywhere effortlessly!\r\nBreathing Lights & Backlit Logo Design: Features creative translucent logo visual and vibrant light design. Adding a modern and stylish touch to the immersive sound experience.\r\nImmersive TWS Surround Sound: Enjoy crystal-clear, 30W output powerful audio with True Wireless Stereo, delivering dynamic surround sound for music, movies, and video.\r\nVersatile Connectivity: Equipped with the latest Bluetooth 5.3 wireless seamless connectivity, Type-C powered, AUX input, and TF card slot. All day playtime, compatible with multiple phone, offering flexible usage options for all your needs.\r\nIdeal Gifts for Anyone: Bluetooth Speakers with stylish design and advanced features. The ultimate gift for any occasion! Creative for Valentine\'s, Easter, Mother\'s, Father\'s, or Christmas Day.', 9.99, '2025-05-19', 0),
(9, 'ASUS ROG Strix G16 Gaming Laptop', 'POWER UP YOUR PLAY - Win more games with Windows 11, a 13th Gen Intel Core i7-13650HX processor, and an NVIDIA GeForce RTX 4060 Laptop GPU at 140W Max TGP.\r\nBLAZING FAST MEMORY AND STORAGE â€“ Multitask swiftly with 16GB of DDR5-4800MHz memory and 1TB of PCIe Gen4 SSD.\r\nROG INTELLIGENT COOLING â€“ The Strix G16 features Thermal Grizzlyâ€™s Conductonaut Extreme liquid metal on the CPU, and a third intake fan among other premium features, to allow for better sustained performance over long gaming sessions.\r\nSWIFT DISPLAY â€“ The Strix G16 features a FHD 165Hz panel, 100% sRGB, Pantone Validation, among other premium features on the Strix G16.\r\nXBOX GAME PASS â€“ Get a free 90-day pass and gain access to over 100 high-quality games. With games added all the time, thereâ€™s always something new to play', 1244.99, '2025-05-19', 0),
(10, 'JBL Tune 510BT', 'NOTE: If headset is too tight we suggest placing them over a ball or something of similar size/shape. Leave undisturbed for at least 24 hours. Repeat if necessary. Please also try length adjustments of either earpiece until both sides best fit you.\r\nJBL PURE BASS SOUND: These wirelss headpones feature the renowned JBL Pure Bass sound, which can be found in the most famous venues all around the world.\r\nWIRELESS BLUETOOTH: These headphones stream wirelessly from your device and can even switch between two devices so that you don\'t miss a call.\r\nUP TO 40 HOURS BATTERY WITH SPEED CHARGE: For long-lasting fun, listen wirelessly for up to 40 hours and recharge the battery in as little as 2 hours with the convenient Type-C USB cable. A quick 5-minute recharge gives you 2 additional hours of music.\r\nMICROPHONE ON EAR CUP FOR HANDS-FREE CALLS: Easily control your sound and manage your calls from your headphones with the convenient buttons on the ear-cup.\r\nASK SIRI OR HEY GOOGLE: Siri or Hey Google is just a button away: activate the voice assistant of your device by pushing the multi-function button.\r\nFeaturing an adjustable headband the Tune 510BT are designed to fit nearly any head size comfortably', 34.99, '2025-05-15', 0),
(11, 'Wireless Earbuds Sport', '2025 Bluetooth 5.4 Technology and Seamless One-Step Pairing:The wireless earbuds feature Bluetooth 5.4 Technology and automatic fast pairing, allowing for a seamless connection with no signal loss or music dropout. With a stable connection distance of up to 33ft, you can easily control your music and phone at home, in the office and during your exercise. Just pick up the bluetooth headphones from ear buds case, the bluetooth earphones can be automatically connected to the previous paired device.\r\nHi-Fi Sound Quality and HD Call: Bluetooth earbuds feature 14.2mm triple-layer diaphragm drivers that are approximately 25% larger than conventional types, combine with a unique sound guide architecture for full low-frequency rebound and pure high-mid-frequency permeability. These ENC noise-cancelling wireless headphones are equipped with four high-definition microphones, which enhance vocal clarity by 85% and reduce external noise by 60%, ensuring that your voice is heard very clearly during phone calls.\r\nQuickly Charge, 75Hrs Total Playtime and Dual LED Display: wireless earphones with type-c charging provides 10-minute fast-charge for 2 hours of playback. Up to 15 hours continuous using time on a single charge, giving 75 hours of a total playtime with portable charging case. The intuitive dual LED display keeps track of the earbuds caseâ€™s remaining power and earphonesâ€™ charging status, allowing you to monitor the power levels in real time. Say goodbye to battery anxiety.\r\nComfort for Sports and IPX7 Sweat-Resistant: The running headphones wireless are ergonomically engineered and equipped with 3 different sizes of soft ear tips (S/M/L) as well as flexible earhooks. Select the most suitable ear tip to keep you motivated, a secure fit that wonâ€™t shift or fall out during long hours of training, and no wires to hold you back. The sport earbuds are waterproof against splashes and sweat-proof, suitable for sports exercise and running.\r\nSensitive Touch Control and Wide Compatibility: The advanced smart chip ensures that touch controls are more precise than others. Easily manage your music, calls, and voice assistant with a simple fingertip touch, while minimizing the risk of accidental commands for a smooth user experience. Beside, bluetooth earphones are compatible with a wide range of bluetooth enabled devices like smartphones, TVs, computers, laptops etc.', 25.99, '2025-05-15', 0),
(12, 'Acer Nitro KG241Y Sbiip 23.8â€', '23.8\" Full HD (1920 x 1080) Widescreen VA Monitor | AMD FreeSync Premium Technology\r\nRefresh Rate: 165Hz | Response Time: 1ms (VRB) | Pixel Pitch: 0.275mm | Color Saturation: NTSC 72%\r\nZero-Frame Design | HDR Ready\r\nVESA mounting compliant (100 x 100mm) | Ergonomic Tilt: -5Â° to 15Â°\r\nPorts: 1 x Display Port 1.2 and 2 x HDMI 2.0 (HDMI Cable Included)', 109.00, '2025-05-19', 0),
(13, 'Logitech G502 HERO High Performance Wired Gaming Mouse', 'Hero 25K sensor through a software update from G HUB, this upgrade is free to all players: Our most advanced, with 1:1 tracking, 400-plus ips, and 100 - 25,600 max dpi sensitivity plus zero smoothing, filtering, or acceleration\r\n11 customizable buttons and onboard memory: Assign custom commands to the buttons and save up to five ready to play profiles directly to the mouse\r\nAdjustable weight system: Arrange up to five removable 3.6 grams weights inside the mouse for personalized weight and balance tuning\r\nProgrammable RGB Lighting and Lightsync technology: Customize lighting from nearly 16.8 million colors to match your team\'s colors, sport your own or sync colors with other Logitech G gear\r\nMechanical switch button tensioning: Metal spring tensioning system and pivot hinges are built into left and right gaming mouse buttons for a crisp, clean click feel with rapid click feedback\r\n1 year hardware limited warranty. USB report rate: 1000Hz (1ms)\r\nMicroprocessor: 32-bit ARM. Use Logitech G HUB to save your settings to the on board memory on the mouse and take them with you. Your saved settings will work on any PC without additional software or any login required.', 40.27, '2025-05-19', 0),
(14, 'SUS Chromebook CX15 Laptop, 15.6', 'RUNS CHROMEOS â€”The fast, secure operating system from Google with built-in Google apps like Gmail, Gemini, Docs, Photos, YouTube, and more, so you can go from deadlines to downtime straight out of the box.\r\nSTARTS FAST, LONG BATTERY LIFE â€” Chromebooks start up in under 10 seconds. And with long hours of battery life and automatic updates, you can get things done without disruptions.\r\nGEMINI ADVANCED OFFER â€” With the 3-month Google One AI Premium Plan, you get Gemini Advanced, 2TB of cloud storage, and Gemini in Gmail, Docs, and more - all on us when you purchase a Chromebook.*\r\nYOUTUBE PREMIUM OFFER â€” Get 3 months of YouTube Premium on us and enjoy videos and music, ad-free*\r\nSPACIOUS STORAGE AND FAST MEMORY â€” Class-leading 128GB storage with 8GB fast memory offers the freedom to store more and delete less\r\nSNAPPY OPERATING EXPERIENCE â€” Powered by the Intel Celeron N4500 Processor, ensuring fast and smooth operation\r\nLIGHTWEIGHT YET DURABLE â€” Durable and built to meet Military Grade standard MIL-STD 810H, weighing just 3.51 lbs', 269.99, '2025-05-19', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(1024) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(32) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userID`, `email`, `name`, `address`, `password`, `role`) VALUES
(1, 'tomasz.gorazd@gmail.com', 'Tomasz', '3 rue Principale, Luxembourg', '$2y$10$hmLt7a.21q0Ewkeg0p8LOeqmuH/d3FxynOz9mTv9OBjr7IFIbsRqO', 'user'),
(6, 'john@example.com', 'John', '4 rye des   ', '$2y$10$Qd1z8a6frIZd77yZeS5NR.DH2zGI9D0mo6GtKkXeWDjRMsnbHBb92', 'user'),
(7, 'bob@gmail.com', 'Bob', 'I do not know', '$2y$10$mgWQ37/FYLugM/mZ77o7su4Ujc7Cp2YUIVPkwqgyZv3Y1Ohl7C6AK', 'user'),
(8, 'rosca.radu93@gmail.com', 'Radu ROSCA', '15 Rue du Pont', '$2y$10$q1EQIeH79i.r1I0saw8HSOTMgMPiuhjyT/Gw4fLe0nuqxUnQMW/ui', 'admin'),
(12, 'arina.radu01@gmail.com', 'Arina ROSCA', '15 Rue du Pont', '$2y$10$JUdk5bp9o4Qu2MvaSuB3.un5V1IkeKFwCSnBZuSiI32kL.JlQdmbK', 'admin'),
(13, 'irina.rosca@gmail.com', 'Irina', '15 Rue du Pont', '$2y$10$R/M0URY3iu5zfGmALqqzVe3Ho3Q7ybXvAANZBk953ssq2uefFsFPa', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`) USING BTREE;

--
-- Index pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detailsID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
