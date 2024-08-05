-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 16 2024 г., 20:38
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fitwear-db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `brand_id` int NOT NULL,
  `brand_name` varchar(45) NOT NULL,
  `brand_logo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_logo`) VALUES
(1, 'Nike', 'nike.png'),
(2, 'Jordan', 'jordan.png'),
(3, 'New Balance', 'new_balance.png'),
(4, 'Puma', 'puma.png'),
(5, 'Adidas', 'adidas.png'),
(6, 'Under Armour', 'under_armour.png'),
(7, 'Champion', 'champion.png'),
(8, 'Kappa', 'kappa.png');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `category_name` varchar(45) NOT NULL,
  `category_type_ua` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `category_type_en` varchar(55) NOT NULL,
  `category_gender` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_type_ua`, `category_type_en`, `category_gender`) VALUES
(1, 'shoes', 'Аквавзуття', 'aquashoes', 'male'),
(2, 'shoes', 'Бутси', 'boots', 'male'),
(3, 'shoes', 'В\'єтнамки', 'flip-flops', 'male'),
(4, 'shoes', 'Кеди', 'trainers', 'male'),
(5, 'shoes', 'Кросівки', 'sneakers', 'male'),
(6, 'shoes', 'Сандалі', 'sandals', 'male'),
(7, 'shoes', 'Черевики', 'shoes', 'male'),
(8, 'shoes', 'Шльопанці', 'spanking', 'male'),
(10, 'clothes', 'Вітровка', 'windbreaker', 'male'),
(11, 'clothes', 'Кофта', 'sweatshirt', 'male'),
(12, 'clothes', 'Куртка', 'jacket', 'male'),
(13, 'clothes', 'Куртка-жилет', 'vest', 'male'),
(14, 'clothes', 'Лосини', 'leggins', 'male'),
(15, 'clothes', 'Майка', 'jersey', 'male'),
(16, 'clothes', 'Пуховик', 'downjacket', 'male'),
(17, 'clothes', 'Сорочка', 'shirt', 'male'),
(18, 'clothes', 'Спідня білизна', 'underwear', 'male'),
(19, 'clothes', 'Спортивний костюм', 'sport-suit', 'male'),
(20, 'clothes', 'Спортивні штани', 'pants', 'male'),
(21, 'clothes', 'Футболка', 't-shirt', 'male'),
(22, 'clothes', 'Термобілизна', 'termo', 'male'),
(23, 'clothes', 'Шорти', 'shorts', 'male'),
(24, 'accessories', 'Аксесуари для плавання', 'swiming-acc', 'male'),
(25, 'accessories', 'Аксесуари для тренувань', 'training-acc', 'male'),
(26, 'accessories', 'Гаманець', 'purse', 'male'),
(27, 'accessories', 'Ремінь', 'belt', 'male'),
(28, 'accessories', 'Кепка', 'cap', 'male'),
(29, 'accessories', 'Панамка', 'panama', 'male'),
(30, 'accessories', 'Гетри', 'gaiters', 'male'),
(31, 'accessories', 'Щитки', 'shin-pads', 'male'),
(32, 'accessories', 'М\'яч', 'ball', 'male'),
(33, 'accessories', 'Рукавиці', 'gloves', 'male'),
(34, 'accessories', 'Рушник', 'towel', 'male'),
(35, 'accessories', 'Рюкзак', 'backpack', 'male'),
(36, 'accessories', 'Сумка', 'bag', 'male'),
(37, 'accessories', 'Шапка', 'hat', 'male'),
(38, 'accessories', 'Шарф', 'scarf', 'male'),
(39, 'accessories', 'Шкарпетки', 'socks', 'male'),
(40, 'shoes', 'Аквавзуття', 'aquashoes', 'female'),
(41, 'shoes', 'В\'єтнамки', 'flip-flops', 'female'),
(42, 'shoes', 'Кеди', 'trainers', 'female'),
(43, 'shoes', 'Кросівки', 'sneakers', 'female'),
(44, 'shoes', 'Сандалі', 'sandals', 'female'),
(45, 'shoes', 'Черевики', 'chereviki', 'female'),
(46, 'shoes', 'Шльопанці', 'spanking', 'female'),
(47, 'clothes', 'Вітровка', 'windbreaker', 'female'),
(48, 'clothes', 'Кофта', 'sweatshirt', 'female'),
(49, 'clothes', 'Купальник', 'swimsuit', 'female'),
(50, 'clothes', 'Куртка', 'jacket', 'female'),
(51, 'clothes', 'Куртка-жилет', 'vest', 'female'),
(52, 'clothes', 'Лосини', 'leggins', 'female'),
(53, 'clothes', 'Майка', 'jersey', 'female'),
(54, 'clothes', 'Плаття', 'dress', 'female'),
(55, 'clothes', 'Пуховик', 'downjacket', 'female'),
(56, 'clothes', 'Сорочка', 'shirt', 'female'),
(57, 'clothes', 'Спідниця', 'skirt', 'female'),
(58, 'clothes', 'Спідня білизна', 'underwear', 'female'),
(59, 'clothes', 'Спортивний костюм', 'sport-suit', 'female'),
(60, 'clothes', 'Спортивні штани', 'pants', 'female'),
(61, 'clothes', 'Футболка', 't-shirt', 'female'),
(62, 'clothes', 'Топ', 'top', 'female'),
(63, 'clothes', 'Термобілизна', 'termo', 'female'),
(64, 'clothes', 'Шорти', 'shorts', 'female'),
(65, 'accessories', 'Аксесуари для плавання', 'swiming-acc', 'female'),
(66, 'accessories', 'Аксесуари для тренувань', 'training-acc', 'female'),
(67, 'accessories', 'Гаманець', 'purse', 'female'),
(68, 'accessories', 'Ремінь', 'belt', 'female'),
(69, 'accessories', 'Кепка', 'cap', 'female'),
(70, 'accessories', 'Панамка', 'panama', 'female'),
(71, 'accessories', 'Гетри', 'gaiters', 'female'),
(72, 'accessories', 'Щитки', 'shin-pads', 'female'),
(73, 'accessories', 'М\'яч', 'ball', 'female'),
(74, 'accessories', 'Рукавиці', 'gloves', 'female'),
(75, 'accessories', 'Рушник', 'towel', 'female'),
(76, 'accessories', 'Рюкзак', 'backpack', 'female'),
(77, 'accessories', 'Сумка', 'bag', 'female'),
(78, 'accessories', 'Шапка', 'hat', 'female'),
(79, 'accessories', 'Шарф', 'scarf', 'female'),
(80, 'accessories', 'Шкарпетки', 'socks', 'female'),
(81, 'shoes', 'Аквавзуття', 'aquashoes', 'child'),
(82, 'shoes', 'Кеди', 'trainers', 'child'),
(83, 'shoes', 'Кросівки', 'sneakers', 'child'),
(84, 'shoes', 'Сандалі', 'sandals', 'child'),
(85, 'shoes', 'Черевики', 'chereviki', 'child'),
(86, 'shoes', 'Чоботи', 'bots', 'child'),
(87, 'shoes', 'Шльопанці', 'spanking', 'child'),
(88, 'clothes', 'Кофта', 'sweatshirt', 'child'),
(89, 'clothes', 'Куртка', 'jacket', 'child'),
(90, 'clothes', 'Куртка-жилет', 'vest', 'child'),
(91, 'clothes', 'Лосини', 'leggins', 'child'),
(92, 'clothes', 'Плаття', 'dress', 'child'),
(93, 'clothes', 'Пуховик', 'downjacket', 'child'),
(94, 'clothes', 'Спортивний костюм', 'sport-suit', 'child'),
(95, 'clothes', 'Спортивні штани', 'pants', 'child'),
(96, 'clothes', 'Футболка', 't-shirt', 'child'),
(97, 'clothes', 'Термобілизна', 'termo', 'child'),
(98, 'clothes', 'Шорти', 'shorts', 'child'),
(99, 'accessories', 'Аксесуари для плавання', 'swiming-acc', 'child'),
(100, 'accessories', 'Кепка', 'cap', 'child'),
(101, 'accessories', 'Панамка', 'panama', 'child'),
(102, 'accessories', 'Рюкзак', 'backpack', 'child'),
(103, 'accessories', 'Сумка', 'bag', 'child'),
(104, 'accessories', 'Шапка', 'hat', 'child'),
(105, 'accessories', 'Шкарпетки', 'socks', 'child');

-- --------------------------------------------------------

--
-- Структура таблицы `club cards`
--

CREATE TABLE `club cards` (
  `club_card_id` int NOT NULL,
  `club_card_name` varchar(45) NOT NULL,
  `club_card_discount` int NOT NULL,
  `club_card_sum` float NOT NULL,
  `club_card_image` varchar(45) DEFAULT NULL,
  `club_card_issue_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `collections`
--

CREATE TABLE `collections` (
  `collection_id` int NOT NULL,
  `collection_brand_id` int NOT NULL,
  `collection_name` varchar(45) NOT NULL,
  `collection_description` text CHARACTER SET utf8 COLLATE utf8_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `collections`
--

INSERT INTO `collections` (`collection_id`, `collection_brand_id`, `collection_name`, `collection_description`) VALUES
(1, 1, 'Air', NULL),
(2, 1, 'Air Max', 'MAX AIR - амортизаційні елементи, які вміщують максимальний обсяг газу для виняткового захисту від ударів.'),
(3, 1, 'Tech Fleece', 'Колекція Nike Tech Fleece виготовлена з легкого, гладенького з двох сторін, теплого матеріалу з преміальним зовнішнім виглядом та конструкцією, яка відома усім шанувальникам бренду.'),
(4, 1, 'Air Force', NULL),
(5, 1, 'Court', 'Колекція Nike Court відтворює баскетбольний стиль середини 1980-х і використовується як повсякденне взуття для вулиці.');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `comment_status` varchar(63) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `comment_description` text,
  `comment_user_id` int NOT NULL,
  `comment_product_id` int NOT NULL,
  `comment_time` datetime NOT NULL,
  `comment_assessment` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_status`, `comment_description`, `comment_user_id`, `comment_product_id`, `comment_time`, `comment_assessment`) VALUES
(1, 'send', 'Відмінна річ', 1, 3, '2024-06-10 12:16:15', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `event_id` int NOT NULL,
  `event_name` varchar(45) NOT NULL,
  `event_description` text,
  `event_start_date` date NOT NULL,
  `event_end_date` date DEFAULT NULL,
  `event_products` varchar(255) NOT NULL,
  `event_image` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `order_number` varchar(65) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_user_id` int NOT NULL,
  `order_user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_user_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_user_phone_num` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_products` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_sum` float NOT NULL,
  `order_discount` int DEFAULT NULL,
  `order_type` varchar(65) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_adress` text NOT NULL,
  `order_status` varchar(65) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_admin` int DEFAULT NULL,
  `order_store_id` int DEFAULT NULL,
  `order_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `order_number`, `order_user_id`, `order_user_name`, `order_user_email`, `order_user_phone_num`, `order_products`, `order_sum`, `order_discount`, `order_type`, `order_adress`, `order_status`, `order_admin`, `order_store_id`, `order_time`) VALUES
(1, '122-933-1794', 1, 'Ivanov Ivan Ivanovich', 'ivan_ivanov@gmail.com', '+380000000000', '2-S-2, 3-S-1', 30756, 0, 'Самовиніс', '', 'Замовлення створено', NULL, NULL, '2024-06-12'),
(2, '093-872-6455', 3, 'Ivanov Ivan Ivanovich', 'ivan_ivanov@gmail.com', '+380000000000', '2-S-2, 3-S-1', 30756, 0, 'Самовиніс', '', 'Замовлення створено', NULL, NULL, '2024-06-13'),
(3, '788-118-5042', 2, 'Admin_f Admin_m Admin_l', 'admin@fitwear.com', '+380000000000', '1-S-1', 6990, 0, 'Самовиніс', '', 'Замовлення створено', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_gender` varchar(45) NOT NULL,
  `product_sizes` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_price` float NOT NULL,
  `product_discount` int DEFAULT NULL,
  `product_description` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `product_season` varchar(45) NOT NULL,
  `product_articul` varchar(45) NOT NULL,
  `product_color` varchar(45) NOT NULL,
  `product_maker` varchar(45) NOT NULL,
  `product_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_type` int NOT NULL,
  `product_brand_id` int NOT NULL,
  `product_collection_id` int DEFAULT NULL,
  `product_category_id` int NOT NULL,
  `product_likes` int NOT NULL,
  `product_avaliability` text NOT NULL,
  `product_blocked_status` tinyint(1) NOT NULL,
  `product_link` varchar(45) NOT NULL,
  `product_new` tinyint(1) NOT NULL,
  `product_add_date` date NOT NULL,
  `product_main_image` varchar(255) NOT NULL,
  `product_images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_gender`, `product_sizes`, `product_price`, `product_discount`, `product_description`, `product_season`, `product_articul`, `product_color`, `product_maker`, `product_content`, `product_type`, `product_brand_id`, `product_collection_id`, `product_category_id`, `product_likes`, `product_avaliability`, `product_blocked_status`, `product_link`, `product_new`, `product_add_date`, `product_main_image`, `product_images`) VALUES
(1, 'M NK TCH FLEECE FZ WR HOODIE 164412', 'Чоловіча', 'XS-2, S-2, M-4, L-2, XL-1, 2XL-1', 6990, 0, NULL, 'Весна-Літо 2024, Демисезон', 'FZ4709-104', 'молочний, чорний, сірий', 'Камбоджа', '53% бавовна, 47% поліестер', 0, 1, 3, 11, 0, '1', 0, 'nike_m-nk-tch-fleece-fz-wr-hoodie-164412', 1, '2024-04-10', 'nike-tch-fleece-hoodie-wbg-164412.jpeg', 'nike-tch-fleece-hoodie-wbg-164412-1.jpeg; nike-tch-fleece-hoodie-wbg-164412-2.jpeg'),
(2, 'M NK TCH FLC FZ WR HOODIE 159350', 'Чоловіча', 'S-3, M-2, L-3, XL-1, 2XL-1, 3XL-1', 6990, 0, 'Кофта Nike M Nk Tch Flc Fz Wr Hoodie відтворює витончені лінії Windrunner, які нагадують класичну бігову куртку кінця 70-х років. Класичний крій, спущені плечові шви та дизайн рукава з панелями не обмежуватимуть Ваших рухів, а еластичний край допоможе утримувати Ваше тепло та покращуватиме фіксацію. Бічні кишені на блискавці дозволять мати при собі потрібні дрібнички, а капюшон захистить від несприятливих погодних умов. Кофта декорована логотипом, який підкреслить її приналежність до бренду. Nike піклується про зниження впливу на довкілля, тому матеріал виробу виготовлено щонайменше на 50% з екологічно чистих матеріалів із використанням суміші переробленого поліефіру та органічної бавовни.', 'Весна-Літо 2024, Демисезон', 'FB7921-010', 'чорний', 'Камбоджа', '53% бавовна, 47% поліестер', 0, 1, 3, 11, 1, '1', 0, 'nike_m-nk-tch-flc-fz-wr-hoodie-159350', 1, '2024-04-10', 'nike-tch-fleece-hoodie-b-159350.jpeg', ''),
(3, 'M NK TCH FLC FZ WR HOODIE 159351', 'Чоловіча', 'XS-1, S-2, M-4, L-1', 6990, 30, 'Кофта Nike M Nk Tch Flc Fz Wr Hoodie відтворює витончені лінії Windrunner, які нагадують класичну бігову куртку кінця 70-х років. Класичний крій, спущені плечові шви та дизайн рукава з панелями не обмежуватимуть Ваших рухів, а еластичний край допоможе утримувати Ваше тепло та покращуватиме фіксацію. Бічні кишені на блискавці дозволять мати при собі потрібні дрібнички, а капюшон захистить від несприятливих погодних умов. Кофта декорована логотипом, який підкреслить її приналежність до бренду. Nike піклується про зниження впливу на довкілля, тому матеріал виробу виготовлено щонайменше на 50% з екологічно чистих матеріалів із використанням суміші переробленого поліефіру та органічної бавовни.', 'Весна-Літо 2024, Демисезон', 'FB7921-064', 'чорний, сірий', 'Камбоджа', '53% бавовна, 47% поліестер', 0, 1, 3, 11, 0, '1', 0, 'nike_m-nk-tch-flc-fz-wr-hoodie-159351', 0, '2024-04-10', 'nike-tch-fleece-hoodie-wb-159351.jpeg', ''),
(4, '90 140952', 'Чоловіча', '26-1, 26.5-1, 27-1, 27.5-2, 28-2, 28.5-1, 29-1, 29.5-1, 30-1', 8590, 0, 'Історія моделі починається з 1978 року, коли революційна технологія Air вперше потрапила у взуття Nike. Через 5 років Air Max дебютували з видимим блоком на п’яті, що дозволило шанувальникам не лише відчути повітряну амортизацію, а й побачити. Кросівки Nike Air Max 90 залишаються вірними своєму біговому корінню із культовою підошвою Waffle. Їх верх з комбінування різних матеріалів, що забезпечуватиме Вашим ногам оптимальний мікроклімат всередині. Проміжна підошва з блоком Max Air забезпечить легку амортизацію та поглинатиме усі ударні навантаження, а підметка зі спеціальними канавками надасть необхідне зчеплення та дозволить кросівкам адаптуватись до Вашого стилю ходи.', 'Весна-Літо 2024, Демисезон', 'CN8490-002', 'сірий, чорний', 'В\'єтнам', '45%текстиль;35%шкіра з покриттям; 20%синтетика Підошва: 100%гума', 1, 1, 2, 5, 0, '1', 0, 'nike-air-max-90-140952', 1, '2024-04-17', 'nike-airmax90-140952.jpeg', NULL),
(5, 'Excee 123982', 'Чоловіча', '26-1, 26.5-1, 27-1, 27.5-2, 28-2, 28.5-1, 29-1, 29.5-1, 30-1', 6290, 25, 'Кросівки Nike Air Max Excee відтворюють класичну естетику Air Max 90-х років з новітніми акцентами. Верх моделі поєднує натуральну та синтетичну шкіру з текстильними матеріалами, що надає їм стильного вигляду, повітропроникності та стійкості до зношування. Завдяки використанню технології Air Max забезпечують відмінну амортизацію, що дозволяє зменшити вплив ударів під час ходьби й гарантує комфорт протягом усього дня. Гумова підошва додає надійного зчеплення з поверхнею та має відмінні експлуатаційні властивості. Ретро дизайн моделі доповнено логотипами, які підкреслюють приналежність товару до бренду.', 'Весна-Літо 2023, Демисезон', 'CD4165-100', 'світло-сірий, білий', 'В\'єтнам', '45% шкіра, 15% синтетика, 40% текстиль; Підошва: 70% гума, 30% пластик', 1, 1, 2, 5, 0, '1', 0, 'nike-air-max-excee-123982', 0, '2024-04-17', 'nike-air-max-excee-123982.jpeg', NULL),
(6, 'M NK TCH FLC JGGR 159354', 'Чоловіча', 'XS-2, S-2, M-4, L-2, XL-1, 2XL-1', 5490, 0, 'Спортивні штани Nike M Nk Tch Flc Jggr стануть зручним вибором для повсякденного використання. Вони мають спеціальний, злегка звужений до низу, крій, який не обмежуватиме Ваших рухів, а широкі манжети знизу покращуватимуть фіксацію та допоможуть продемонструвати улюблену пару взуття. Еластичний пояс з текстильним шнурком гарантує надійну та індивідуальну посадку. Бічні кишені, одна з яких на блискавці, дозволять мати при собі цінні дрібнички. Логотип Nike Futura підкреслить колекційність моделі. Nike піклується про зниження впливу на довкілля, тому матеріал виробу виготовлено щонайменше на 50% з екологічно чистих матеріалів із використанням суміші переробленого поліефіру та органічної бавовни.', 'Весна-Літо 2024, Демисезон', 'FB8002-010', 'чорний', 'Камбоджа', '53% бавовна, 47% поліестер', 0, 1, 3, 20, 0, '', 0, 'nike_m-nk-tch-flc-jggr-159354', 1, '2024-04-17', 'nike-M-NK-TCH-FLC-JGGR-159354.jpeg', NULL),
(7, 'M NK TCH FLC JGGR 159615', 'Чоловіча', 'XS-2, S-2, M-4, L-2, XL-1, 2XL-1', 5880, 25, 'Спортивні штани Nike M Nk Tch Flc Jggr стануть зручним вибором для повсякденного використання. Вони мають спеціальний, злегка звужений до низу, крій, який не обмежуватиме Ваших рухів, а широкі манжети знизу покращуватимуть фіксацію та допоможуть продемонструвати улюблену пару взуття. Еластичний пояс з текстильним шнурком гарантує надійну та індивідуальну посадку. Бічні кишені, одна з яких на блискавці, дозволять мати при собі цінні дрібнички. Логотип Nike Futura підкреслить колекційність моделі. Nike піклується про зниження впливу на довкілля, тому матеріал виробу виготовлено щонайменше на 50% з екологічно чистих матеріалів із використанням суміші переробленого поліефіру та органічної бавовни.', 'Весна-Літо 2024, Демисезон', 'FB8002-222', 'оливковий', 'Камбоджа', '53% бавовна, 47% поліестер', 0, 1, 3, 20, 0, '1', 0, 'nike_m-nk-tch-flc-jggr-159615', 0, '2024-04-17', 'nike-M-NK-TCH-FLC-JGGR-159615.jpeg', NULL),
(8, 'U NK DF CLUB CAP S CB P 164665', 'Чоловіча', 'M/L-4', 1360, 0, NULL, 'Весна-Літо 2024, Літо, Демисезон', 'FB5625-025', 'білий', 'Китай', '100% поліестер', 2, 1, NULL, 28, 0, '1', 0, 'nike_u-nk-df-club-cap-s-cb-p-164665', 1, '2024-04-17', 'Nike-U-NK-DF-CLUB-CAP-S-CB-P-164665.jpeg', NULL),
(9, 'Heritage 147871', 'Унісекс', 'OS-3', 2850, 0, 'NIKE HERITAGE - комфортний рюкзак для повсякденного використання. Велике основне відділення забезпечує легкий доступ до речей і містить спеціальне відділення для ноутбука. Додаткові відділення на блискавці допоможуть упорядкувати речі, додають зручності та захистять ваші ключі, гаманець і телефон. Великий внутрішній об\'єм дозволяє вмістити все необхідне. Додаткова кишеня на блискавці спереду необхідна для речей, що мають завжди бути під рукою. Укріплена спинка доповнена регульованими лямками, що забезпечує високий рівень комфорту під час тривалого використання. Логотип бренду вдало доповнює дизайн виробу.\r\n\r\nРозміри рюкзака: 46 x 30.5 x 15 см.', 'Весна-Літо 2024, Всесезон', 'DN3592-010', 'чорний', 'Індонезія', '100% поліестер', 2, 1, NULL, 35, 0, '1', 0, 'nike_heritage-147871', 1, '2024-04-17', 'nike-herritage-147871.jpeg', NULL),
(10, 'M NK WVN LND WR HD JKT 164338', 'Чоловіча', 'XS-2, S-2, M-4, L-2, XL-1, 2XL-1', 5470, 13, 'Вітрівка Nike M Nk Wvn Lnd Wr Hd Jkt виготовлена з легкого матеріалу та з сітчастою підкладкою, що гарантуватиме Вам відчуття комфорту протягом усього дня. Класичний крій з рукавом реглан подарують повну свободу рухів, а манжети на рукавах та по низу виробу покращуватимуть фіксацію. Капюшон доповнено текстильним шнурком, що забезпечить максимальний захист від несприятливих погодних умов. Бічні кишені на блискавці вмістять найнеобхідніші дрібнички. Вітрівка декорована логотипом та елементами колекції, що підкреслить її спортивний стиль. Nike піклується про зниження впливу на довкілля, тому матеріал виробу виготовлено зі 100% перероблених волокон.', 'Весна-Літо 2024, Літо, Демисезон', 'DA0001-134', 'молочний, чорний', 'В\'єтнам', '100% поліестер', 1, 1, NULL, 10, 0, '1', 0, 'nike_m-nk-wvn-lnd-wr-hd-jkt-164338', 1, '2024-05-20', 'Nike M NK WVN LND WR HD JKT 164338.jpeg', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `stores`
--

CREATE TABLE `stores` (
  `store_id` int NOT NULL,
  `store_name` varchar(45) NOT NULL,
  `store_adress` varchar(45) NOT NULL,
  `store_work_time` varchar(45) NOT NULL,
  `store_contacts` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `stores`
--

INSERT INTO `stores` (`store_id`, `store_name`, `store_adress`, `store_work_time`, `store_contacts`) VALUES
(1, 'Головний', 'Житомир', '9:00-19:00', '+380980256162');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `user_role_ability` int NOT NULL,
  `user_firstname` varchar(45) NOT NULL,
  `user_middlename` varchar(45) NOT NULL,
  `user_lastname` varchar(45) NOT NULL,
  `user_birthday` date DEFAULT NULL,
  `user_phone_number` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `user_liked_products` varchar(45) DEFAULT NULL,
  `user_orders` varchar(45) DEFAULT NULL,
  `user_promocodes` varchar(45) DEFAULT NULL,
  `user_bonuses` varchar(45) DEFAULT NULL,
  `user_register_date` date NOT NULL,
  `user_club_card_id` int DEFAULT NULL,
  `user_adress` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_role_ability`, `user_firstname`, `user_middlename`, `user_lastname`, `user_birthday`, `user_phone_number`, `user_liked_products`, `user_orders`, `user_promocodes`, `user_bonuses`, `user_register_date`, `user_club_card_id`, `user_adress`) VALUES
(1, 'ivan_ivanov@gmail.com', '12345', 1, 'Ivanov1', 'Ivan', 'Ivanovich', '2000-01-01', '+380000000000', '2,', NULL, NULL, NULL, '2024-05-01', NULL, ' '),
(2, 'admin@fitwear.com', 'adminpass111', 2, 'Admin_f', 'Admin_m', 'Admin_l', '2000-01-01', '+380000000000', '', NULL, NULL, NULL, '2000-01-01', NULL, ''),
(3, 'petruk_vadim@meta.com', 'vadim123', 1, 'Петрук', 'Вадим', 'Павлович', '1997-08-24', '+380963267289', NULL, NULL, NULL, NULL, '2024-06-13', NULL, NULL),
(4, 'toha777@gmail.com', 'toha01', 1, 'Кирийчук', 'Антон', 'Петрович', '2004-03-13', '+380630785672', NULL, NULL, NULL, NULL, '2024-05-17', NULL, NULL),
(5, 'yaroslav_nik@gmail.com', 'silver234', 1, 'Ніколайчук', 'Ярослав', 'Сергійович', '2001-12-02', '+380954317492', NULL, NULL, NULL, NULL, '2024-06-02', NULL, NULL),
(6, 'ivan_ivanov1@gmail.com', '1234', 1, 'Ivanov', 'Ivan', 'Ivanovich', '2003-09-29', '+380980256162', NULL, NULL, NULL, NULL, '2024-06-08', NULL, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `club cards`
--
ALTER TABLE `club cards`
  ADD PRIMARY KEY (`club_card_id`);

--
-- Индексы таблицы `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`collection_id`),
  ADD KEY `FK_1` (`collection_brand_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FK_1` (`comment_user_id`),
  ADD KEY `FK_2` (`comment_product_id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_1` (`order_user_id`),
  ADD KEY `FK_2` (`order_store_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_1` (`product_brand_id`),
  ADD KEY `FK_2` (`product_collection_id`),
  ADD KEY `FK_3` (`product_category_id`);

--
-- Индексы таблицы `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FK_1` (`user_club_card_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `club cards`
--
ALTER TABLE `club cards`
  MODIFY `club_card_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `collections`
--
ALTER TABLE `collections`
  MODIFY `collection_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `FK_2` FOREIGN KEY (`collection_brand_id`) REFERENCES `brands` (`brand_id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_10` FOREIGN KEY (`comment_product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `FK_9` FOREIGN KEY (`comment_user_id`) REFERENCES `users` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_6` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `FK_8` FOREIGN KEY (`order_store_id`) REFERENCES `stores` (`store_id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_3` FOREIGN KEY (`product_brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `FK_4` FOREIGN KEY (`product_collection_id`) REFERENCES `collections` (`collection_id`),
  ADD CONSTRAINT `FK_5` FOREIGN KEY (`product_category_id`) REFERENCES `category` (`category_id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_9_1` FOREIGN KEY (`user_club_card_id`) REFERENCES `club cards` (`club_card_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
