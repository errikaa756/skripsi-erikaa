--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ac91hlcjk36pu99d6lfe1odfpqr8f815', '::1', 1603688646, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630333638383634363b7265646972656374696f6e7c4e3b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a223936653737313364393361616164366139393436326437636431363133663463306238666230323261346537326631356566366134393332636438663231393137633930633334303362396638356130623230663062646536393833633234363732636339393064656134336364373662323864616132373731623430383864796453443947666c6747716c3139784c35514238573831664a2f3866426b704b30426f5733615045384c53637163396e342f7353794150496662346f5536344d374f456e33316558557444646e7576655176796c4e645a7869545872782f39522b53463575624e72444b6e38584f4559756645456b4e4d347035704752476d35223b),
('eapgcstehb2ib1ha0eiae392tb1pjg39', '::1', 1603691650, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630333639313635303b7265646972656374696f6e7c4e3b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a223936653737313364393361616164366139393436326437636431363133663463306238666230323261346537326631356566366134393332636438663231393137633930633334303362396638356130623230663062646536393833633234363732636339393064656134336364373662323864616132373731623430383864796453443947666c6747716c3139784c35514238573831664a2f3866426b704b30426f5733615045384c53637163396e342f7353794150496662346f5536344d374f456e33316558557444646e7576655176796c4e645a7869545872782f39522b53463575624e72444b6e38584f4559756645456b4e4d347035704752476d35223b),
('o79rj85c5ok5kp4laecl06u2gsilgalj', '::1', 1603691951, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630333639313935313b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a22613566386561653366646162336235336366393362323331336666306232373434363763383134373134313530663264326339613731336461363834353465373363356365336638663633353735313135643166306636613833623633373563313836643136316263656363643938346537343438333065663436636431386571592b316531747379434872624c454e37464a6a4c3042704e45356e7a4134356c786571574b77333638796f52494a365a49495573742b5178577a706f53373468655870664f79504e49656d3037584a4a506456317636434e4c3358315769744745675659333769655572777a2b3571456348586f45316131654b656c43677a223b),
('kak0av6p29vrlhqf2l6qu730c336e7il', '::1', 1603692261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630333639323236313b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a22333639393239303730383563623232663935393231393734353836383434613236373932396531366365316663386538306163393937643862613735643937376237643261396135633033343463656665303632306263613962666263633464363263353530373630343864326262336234616637623262373033353061383379576762744c662b344350796d684f4e714f38576669454c7937682b4a4b34356461615132526239327538384258556568623850355a65422b54733267354c61552b36767a61792f4153497638656c6e4e48706f4841626e2b61794137504a52354345565645315339676449394c6a4c662f6163756e6d6a6169583037466f50223b),
('nl6h861v72l3gqbv07cmlp7nvkrl1sdr', '::1', 1603692564, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630333639323536343b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a22333639393239303730383563623232663935393231393734353836383434613236373932396531366365316663386538306163393937643862613735643937376237643261396135633033343463656665303632306263613962666263633464363263353530373630343864326262336234616637623262373033353061383379576762744c662b344350796d684f4e714f38576669454c7937682b4a4b34356461615132526239327538384258556568623850355a65422b54733267354c61552b36767a61792f4153497638656c6e4e48706f4841626e2b61794137504a52354345565645315339676449394c6a4c662f6163756e6d6a6169583037466f50223b6f726465725f7175616e746974797c613a303a7b7d746f74616c5f70726963657c693a353030303b7265646972656374696f6e7c733a36383a226148523063446f764c327876593246736147397a644339306232747658334e68655856794c326c755a4756344c6e426f6343397a614739774c324e6f5a574e7262335630223b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a31333030303b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226338316537323864396434633266363336663036376638396363313438363263223b613a363a7b733a323a226964223b733a313a2232223b733a333a22717479223b643a313b733a353a227072696365223b643a31333030303b733a343a226e616d65223b733a31303a224150454c204d45524148223b733a353a22726f776964223b733a33323a226338316537323864396434633266363336663036376638396363313438363263223b733a383a22737562746f74616c223b643a31333030303b7d7d),
('o5e7q06stiia8hfcp9l9esfafbcodi06', '::1', 1603692870, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630333639323837303b7265646972656374696f6e7c4e3b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a22333261313836646664663831656265343365653034373531653139336633336537356330306262636663343161363430383234646266653761616431613930313933363264643865623135383566306337666330313934346337346561653563616166653533356666653466323237366438623534653035376365323939303044386271783562325538753062736e2f3352374f5559622f344a595877574a30314a664b627349723654364f7954557a59465872707a492f704c4f592b7337474e58674b5633516e5a54415856755436684d39675134766b3935744d665277336e456d59474c654f5632573451735a4e446f4237366b754b4a74646847324a61223b),
('bnkmkfdbgm1fg81rrr1rk6ggpg8ovmsv', '::1', 1603693236, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630333639333233363b7265646972656374696f6e7c4e3b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a2239313663353538336562373537623261303965333436303331343832306634636230373138343164643232323937653661643430303431666432643334356432376464363334393363386435613966313364613533646639346362306363663463323532396664343232343663353662366538303465333062326165633533366775316e656c4b4a62544a4c4c304368544547644e6854662f525455715365655939654b334a65455654654c7757786a5a6e4378364471567a796966512f347970467a346c6253316e4f684877597058515673474b55756a445977514e456b6e3846326966435464727a5570394b624a56746565314d595049346f3167705931223b),
('v9efbigk2bu45eir97nalidhgr0fflc9', '::1', 1603693258, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630333639333233363b7265646972656374696f6e7c4e3b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a2239313663353538336562373537623261303965333436303331343832306634636230373138343164643232323937653661643430303431666432643334356432376464363334393363386435613966313364613533646639346362306363663463323532396664343232343663353662366538303465333062326165633533366775316e656c4b4a62544a4c4c304368544547644e6854662f525455715365655939654b334a65455654654c7757786a5a6e4378364471567a796966512f347970467a346c6253316e4f684877597058515673474b55756a445977514e456b6e3846326966435464727a5570394b624a56746565314d595049346f3167705931223b),
('i447iths9psu3i8en2fu9691mfbtki93', '::1', 1603698056, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630333639383035363b7265646972656374696f6e7c4e3b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a22316339316339323239363633373534306533666466376232626166643638303263383838323063363265633731626238333834653033333939393138613461346366643134343834656333323663636239393233376161356562313237303362613966306433646630396230326438646539316233623035623032623636373370677a504e35304f77706c51546871363963554d4a4b6348433252697245553631667a37516a396d346674486934532b4f6e422b6430493970775643525462666754394251775074384f5044726e574849575a685641343543514d3862344763466534466c3548344e4b427178574b7a55664839786c7369705773574e566579223b),
('vse0cu3b7shk15q1a5hvuibdgc26u6nf', '::1', 1603698099, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630333639383035363b7265646972656374696f6e7c4e3b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a22316339316339323239363633373534306533666466376232626166643638303263383838323063363265633731626238333834653033333939393138613461346366643134343834656333323663636239393233376161356562313237303362613966306433646630396230326438646539316233623035623032623636373370677a504e35304f77706c51546871363963554d4a4b6348433252697245553631667a37516a396d346674486934532b4f6e422b6430493970775643525462666754394251775074384f5044726e574849575a685641343543514d3862344763466534466c3548344e4b427178574b7a55664839786c7369705773574e566579223b),
('9jmafkfa38du7o9ki852dap7rultjmcl', '::1', 1603700770, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630333730303736323b7265646972656374696f6e7c4e3b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a22373163386333623736636263633639353865666332626563643162333932363135383165366230623332353632346363373137363566306163643631623035313664646338393266363064636232303930333435646165613337366431653765663631326632343533653765336232393932303931653232373232303363303356736755766e3578322f7a7144562f445134635a544c5546424a424c747479304c5254347573646a456d3759486c6e5659516664356c4259584842477a4d4f4d4374446a44523459316d4954354b4c514e6f4b537174654b535765594f676f30596573517a436d554c6c72345a685242726a7562654f6c4b496c545956523567223b),
('shtel2g73g7o4mp6hrstvtrsr33va7mr', '::1', 1603765658, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630333736353633323b7265646972656374696f6e7c4e3b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a223861663962346237346630306139366463656331366165373162336433336638636531653961613835346632373131616431373530643163613036623765303231653932386530623236333230653938393061396534393464663937376264323266396134393639613939626338346134626164633430366263636265653334417336436c4578716c48594f4c43754733764f416468463664773041586c5951744a504e2f504c4f5775774d6b4c776262767752634e4a34706b324e6c37376750572b31386475514e5a78734d61535a5148527779724d51306433547870534f476f6839414c5a595a4e72716c414534374749497173674e6b4d446968766578223b);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `subject` varchar(128) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `message` mediumtext NOT NULL,
  `contact_date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `reply_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `parent_id`, `name`, `subject`, `email`, `message`, `contact_date`, `status`, `reply_at`) VALUES
(1, NULL, 'Agung Tri Saputra', 'Pengiriman kok lama?', 'martinms.za@gmail.com', 'pengiriman pesanan saya kok lama ya', '2020-03-29 07:40:13', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(32) NOT NULL,
  `credit` decimal(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `is_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `credit`, `start_date`, `expired_date`, `is_active`) VALUES
(1, '#DiRumahAja', 'DIRUMAHAJA19', '5000.00', '2020-03-27', '2020-04-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `address` varchar(191) NOT NULL,
  `profile_picture` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `phone_number`, `address`, `profile_picture`) VALUES
(7, 8, 'Pembeli1', '087741130522', 'Jln. Merdeka Barat- Jakarta Indonesia', NULL),
(8, 10, 'Pembeli2', '087741160520', 'Jln. Merdeka Barat- Jakarta Indonesia', NULL),
(9, 11, 'Pembeli4', '0870000000', 'Jln.Merdeka Barat - Jakarta', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` bigint(20) DEFAULT NULL,
  `order_number` varchar(16) NOT NULL,
  `order_status` enum('1','2','3','4','5') DEFAULT '1',
  `order_date` datetime NOT NULL,
  `total_price` decimal(8,2) DEFAULT NULL,
  `total_items` int(10) DEFAULT NULL,
  `payment_method` int(11) DEFAULT 1,
  `delivery_data` text DEFAULT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coupon_id`, `order_number`, `order_status`, `order_date`, `total_price`, `total_items`, `payment_method`, `delivery_data`, `delivered_date`, `finish_date`) VALUES
(12, 8, NULL, 'IUK26102018329', '2', '2020-10-26 07:09:37', '18000.00', 1, 1, '{\"customer\":{\"name\":\"Pembeli1\",\"phone_number\":\"087741130522\",\"address\":\"Jln. Merdeka Barat- Jakarta Indonesia\"},\"note\":\"\\u30a2\\u30ea\\u30d5\\u3055\\u3093\\r\\n\\r\\n28\\u65e5\\u3067\\u3057\\u305f\\u3089\\u30a4\\u30f3\\u30c9\\u30cd\\u30b7\\u30a2\\u6642\\u9593\\u306713\\u6642\\uff5e14\\u6642\\u306a\\u3089\\r\\n\\u30df\\u30fc\\u30c6\\u30a3\\u30f3\\u30b0\\u3067\\u304d\\u307e\\u3059\\u3002\\r\\n28\\u65e5\\u306b\\u30b7\\u30e3\\u30ea\\u3055\\u3093\\u30fb\\u30b5\\u30d2\\u30c9\\u3055\\u3093\\u306f\\u5927\\u4e08\\u592b\\u3067\\u3059\\u304b\\uff1f\\r\\n\\r\\n\\u576a\\u4e95\\r\\n\"}', NULL, NULL),
(13, 10, NULL, 'PNL261020110401', '2', '2020-10-26 07:16:25', '30000.00', 1, 1, '{\"customer\":{\"name\":\"Pembeli2\",\"phone_number\":\"087741160520\",\"address\":\"Jln. Merdeka Barat- Jakarta Indonesia\"},\"note\":\"Segera Dikrim Ya Admin\"}', NULL, NULL),
(14, 11, NULL, 'ASV261020111546', '3', '2020-10-26 08:37:53', '60000.00', 1, 1, '{\"customer\":{\"name\":\"Pembeli4\",\"phone_number\":\"0870000000\",\"address\":\"Jln.Merdeka Barat - Jakarta\"},\"note\":\"Tolong Dikirim Sesuai Pesanan ya Ka..\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `order_qty` int(10) NOT NULL,
  `order_price` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `order_qty`, `order_price`) VALUES
(3, 4, 2, 1, '31000.00'),
(4, 4, 8, 13, '20000.00'),
(5, 5, 2, 1, '31000.00'),
(6, 5, 13, 12, '20000.00'),
(7, 6, 9, 10, '35000.00'),
(8, 7, 10, 1, '12000.00'),
(9, 7, 9, 1, '35000.00'),
(10, 7, 2, 1, '31000.00'),
(11, 8, 9, 1, '35000.00'),
(12, 8, 1, 5, '65000.00'),
(14, 12, 2, 1, '13000.00'),
(15, 13, 5, 3, '10000.00'),
(16, 14, 1, 3, '20000.00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `payment_price` decimal(8,2) DEFAULT NULL,
  `payment_date` datetime NOT NULL,
  `picture_name` varchar(191) DEFAULT NULL,
  `payment_status` enum('1','2','3') DEFAULT '1',
  `confirmed_date` datetime DEFAULT NULL,
  `payment_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_price`, `payment_date`, `picture_name`, `payment_status`, `confirmed_date`, `payment_data`) VALUES
(6, 12, '40000.00', '2020-10-26 07:13:04', 'Tak_berjudul31_20201026111339.jpg', '1', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Mandiri\",\"name\":\"Pembeli1\",\"number\":\"0987654321\"}}'),
(7, 13, '30000.00', '2020-10-26 07:16:59', 'Tak_berjudul31_20201026111236.jpg', '1', NULL, '{\"transfer_to\":\"bca\",\"source\":{\"bank\":\"BCA\",\"name\":\"Pembeli2\",\"number\":\"1122334455\"}}'),
(8, 14, '60000.00', '2020-10-26 08:38:26', 'Bukti_Transfer.jpg', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Mandiri\",\"name\":\"Pembeli4\",\"number\":\"123456789\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `sku` varchar(32) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `picture_name` varchar(191) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `current_discount` decimal(8,2) DEFAULT 0.00,
  `stock` int(10) NOT NULL,
  `product_unit` varchar(32) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1,
  `add_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sku`, `name`, `description`, `picture_name`, `price`, `current_discount`, `stock`, `product_unit`, `is_available`, `add_date`) VALUES
(1, 2, 'SB750372', 'ANGGUR HITAM', NULL, 'Tak_berjudul31_202010261113391.jpg', '70000.00', '50000.00', 50, 'Kg', 1, '2020-03-26 15:02:52'),
(2, 2, 'BS350420', 'APEL MERAH', NULL, 'Tak_berjudul31_20201026111306_001.jpg', '33000.00', '20000.00', 10, 'Kg', 1, '2020-03-26 15:03:40'),
(4, 2, 'TS120790', 'MELON SEGAR', NULL, 'Tak_berjudul31_202010261115331.jpg', '60000.00', '35000.00', 100, 'Kg', 1, '2020-03-26 19:36:30'),
(5, 2, 'WS120811', 'PISANG SEGAR', NULL, 'Tak_berjudul31_202010261112361.jpg', '35000.00', '25000.00', 20, 'Kg', 1, '2020-03-26 19:36:51'),
(8, 2, 'PS220885', 'MANGGA SEGAR', NULL, 'Tak_berjudul31_202010261114041.jpg', '20000.00', '15000.00', 50, 'Kg', 1, '2020-03-26 19:38:05'),
(9, 2, 'AB450163', 'JAMBU MERAH', NULL, 'Tak_berjudul31_202010261115001.jpg', '40000.00', '30000.00', 50, 'Kg', 1, '2020-03-26 19:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(10) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`) VALUES
(2, 'BUAH'),
(9, 'SAYUR');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `review_text` mediumtext NOT NULL,
  `review_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `order_id`, `title`, `review_text`, `review_date`, `status`) VALUES
(2, 7, 6, 'Sangat puas', 'Pengiriman cepat dan sayur segar', '2020-03-30 08:31:31', 1),
(3, 7, 5, 'Buah segar', 'Buah segar dan kualitasnya sangat bagus', '2020-03-30 08:33:10', 1),
(4, 8, 12, 'Toko Buah Segar', 'Sangat Puas Dengan Pelaynan dan Produknya Segar Semua', '2020-10-26 07:13:38', 1),
(5, 10, 13, 'Toko Buah Segar', 'Pesanan Dikrim Tepat Waktu dan Kualitas Segar Segar', '2020-10-26 07:17:35', 1),
(6, 11, 14, 'Toko Buah Segar', 'Sangat Puas Dengan Pelayanan Adminnya', '2020-10-26 08:38:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `role_name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `key` varchar(32) NOT NULL,
  `content` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `content`) VALUES
(1, 'current_theme_name', 'vegefoods'),
(2, 'store_name', 'Toko Buah Segar'),
(3, 'store_phone_number', '02100110003'),
(4, 'store_email', 'tokobuahsegar@gmail.com'),
(5, 'store_tagline', 'Belanja Buah Segar Segar 24 Jam'),
(6, 'store_logo', 'Logo.png'),
(7, 'max_product_image_size', '20000'),
(8, 'store_description', 'Belanja buah segar dengan murah, mudah dan cepat'),
(9, 'store_address', 'Jl. Merdeka Barat Km.01 - Jakarta Indonesia'),
(10, 'min_shop_to_free_shipping_cost', '20000'),
(11, 'shipping_cost', '5000'),
(12, 'payment_banks', '{\"mandiri\":{\"bank\":\"Mandiri\",\"number\":\"1234567890\",\"name\":\"Toko Buah Segar\"},\"bca\":{\"bank\":\"BCA\",\"number\":\"0987654321\",\"name\":\"Toko Buah Segar\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) DEFAULT 0,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `username`, `password`, `profile_picture`, `role_id`, `register_date`) VALUES
(7, 'Admin Toko Buah', 'admintokobuah@gmail.com', NULL, 'admin', '$2y$10$8g/ydMjIkk4RDX06gUPQS.RCo/lAQujaz4kFvnq1J.0i.8nK9OYAS', '0919f092a8487492631bc84b592a4b0a_icon-wajah1.png', 1, '2020-03-29 08:14:30'),
(8, NULL, 'pembeli@gmail.com', NULL, 'user1', '$2y$10$chkZ5TH8JoBetrJYsujw9eHTSgnp1iLG492o99duNcoYGIVGYP8Lu', NULL, 2, '2020-10-26 06:58:43'),
(10, NULL, 'pembeli2@gmail.com', NULL, 'user2', '$2y$10$BxWbJrsGG.grhKvrNQ6XvOU5lTPARmLOo58Rwuws1kFlze3r4YR1.', NULL, 2, '2020-10-26 07:15:59'),
(11, NULL, 'pembeli4@gmail.com', NULL, 'user4', '$2y$10$P25c7AP7HzotHYvRCvi8XukFH/wKW/IR0uBbOM9pPBKAif8WrR.Iu', NULL, 2, '2020-10-26 08:37:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_contacts_contacts` (`parent_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_customers_users` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orders_users` (`user_id`),
  ADD KEY `FK_orders_coupons` (`coupon_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_product_category` (`category_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_reviews_users` (`user_id`),
  ADD KEY `FK_reviews_orders` (`order_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `FK_contacts_contacts` FOREIGN KEY (`parent_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `FK_customers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_coupons` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FK_payments_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;