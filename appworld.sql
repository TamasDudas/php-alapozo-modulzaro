-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Feb 03. 18:56
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `appworld`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(10, 6, 'Hogy segítenek a demo projectek a fejlődésben', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.', '2025-02-03 17:09:13', '2025-02-03 17:09:13'),
(11, 6, 'Laravel és react stack előnyei', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2025-02-03 17:09:56', '2025-02-03 17:09:56'),
(12, 7, 'Miért érdemes react-et tanulni napjainkban', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in urna ut urna tempor congue eget eu sapien. In varius metus odio, eget blandit sem varius a. Aliquam erat volutpat. Nullam nibh nunc, lobortis et sem eget, feugiat lobortis ipsum. Aenean mattis sit amet dui dignissim rutrum. Fusce a diam ut velit sollicitudin finibus. Morbi nec lacus ultrices nisi tincidunt blandit vitae eu neque. Nullam vestibulum maximus scelerisque. Vestibulum sodales, elit nec auctor rhoncus, metus arcu sollicitudin dolor, vitae sodales dui diam sit amet libero. Maecenas ultricies nisi in lacinia tincidunt. Curabitur aliquam lectus eu ex suscipit, vel sagittis mauris interdum. Vestibulum in tortor dapibus, tempus risus sed, ullamcorper dui. Integer nec quam non nisl dapibus aliquam. Nunc nec interdum justo, eu vehicula augue. Vivamus et pharetra ante. Curabitur tristique vehicula lacus ut feugiat. Integer lacinia placerat fermentum. In facilisis mauris vel metus sagittis, non cursus purus auctor.', '2025-02-03 17:12:19', '2025-02-03 17:12:19'),
(13, 7, 'Mire jó react', 'Nullam at massa nec nunc bibendum lobortis at ut tortor. Nullam et orci vitae ipsum euismod interdum non sed justo. Ut facilisis, est ut pulvinar fringilla, felis dolor sagittis nisl, eu condimentum urna arcu vitae enim. Nam sed ultrices justo. Nullam vel dictum velit, id tempor massa. Aliquam erat volutpat. Vestibulum eu eros vitae sem bibendum suscipit. Duis tempus metus urna, sit amet aliquam quam aliquam ut. Proin tortor metus, tempor a tellus non, laoreet lobortis lorem. Vestibulum vehicula ac nulla sit amet tincidunt. Ut ornare placerat viverra. Fusce condimentum aliquam libero quis pretium.\r\n\r\nMauris vitae ultrices massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam commodo neque eget tortor mollis pulvinar. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse suscipit tellus id tempus laoreet. Etiam viverra tristique egestas. Nunc lorem nulla, ultrices eget magna non, posuere egestas leo. Cras dignissim dui sed vehicula tempor. Proin id bibendum massa. Fusce laoreet metus felis, et egestas elit aliquam ut. Curabitur gravida odio ut augue tincidunt, nec placerat nibh rutrum. Cras tempus in mi eu semper. Aliquam molestie odio quis accumsan iaculis. Duis blandit ex in metus mollis, quis bibendum nisl accumsan. Cras iaculis luctus velit, quis pretium diam.', '2025-02-03 17:13:13', '2025-02-03 17:13:13'),
(14, 8, 'Népszerű framework', 'Duis semper vel dolor ut tincidunt. Quisque dignissim rhoncus lorem a tincidunt. Duis eget porta erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi blandit mollis leo, in tristique mauris. Nulla placerat, augue sed porta tempor, lacus magna dignissim nulla, et tempor diam ipsum euismod orci. Nulla facilisi. Curabitur placerat suscipit urna id condimentum. Fusce ipsum ligula, gravida vel nulla nec, scelerisque malesuada augue. Vestibulum ac tortor ac nisl molestie cursus. Aenean dignissim aliquet convallis.\r\n\r\nPraesent molestie quis orci ut fringilla. Nulla at nulla felis. Maecenas ipsum nunc, efficitur vitae interdum lacinia, viverra nec nunc. Aenean porttitor posuere libero, vitae egestas urna imperdiet in. Phasellus maximus ultrices sem eu lacinia. Proin commodo urna nec libero pulvinar sagittis. Ut tortor lorem, ornare pulvinar bibendum a, posuere vel urna.', '2025-02-03 17:16:01', '2025-02-03 17:16:01'),
(15, 8, 'A webfejlesztés jövője', 'Aliquam pretium nisl id tincidunt egestas. Duis commodo, quam non aliquam mattis, nisl velit suscipit lorem, id imperdiet felis ipsum sit amet arcu. Vestibulum aliquet sit amet est eu bibendum. In sodales ante dolor, sed fringilla enim tempus a. Nam eget enim rhoncus, auctor erat in, rutrum massa. Pellentesque accumsan lacinia nisi, sed feugiat mi tincidunt convallis. Donec porttitor felis in ultrices fermentum. Sed posuere consequat imperdiet.\r\n\r\nDuis semper vel dolor ut tincidunt. Quisque dignissim rhoncus lorem a tincidunt. Duis eget porta erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi blandit mollis leo, in tristique mauris. Nulla placerat, augue sed porta tempor, lacus magna dignissim nulla, et tempor diam ipsum euismod orci. Nulla facilisi. Curabitur placerat suscipit urna id condimentum. Fusce ipsum ligula, gravida vel nulla nec, scelerisque malesuada augue. Vestibulum ac tortor ac nisl molestie cursus. Aenean dignissim aliquet convallis.\r\n\r\nPraesent molestie quis orci ut fringilla. Nulla at nulla felis. Maecenas ipsum nunc, efficitur vitae interdum lacinia, viverra nec nunc. Aenean porttitor posuere libero, vitae egestas urna imperdiet in. Phasellus maximus ultrices sem eu lacinia. Proin commodo urna nec libero pulvinar sagittis. Ut tortor lorem, ornare pulvinar bibendum a, posuere vel urna', '2025-02-03 17:16:46', '2025-02-03 17:17:02');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `nev`, `email`, `password`, `created_at`, `updated_at`, `is_admin`) VALUES
(6, 'Tamás', 'tamas@example.com', '$2y$10$hKQf4WIwouVq67xu5ZaORewX/eMoV.zveA6dZpZytVMDbLnS174Z.', '2025-02-03 17:08:13', '2025-02-03 17:10:07', 1),
(7, 'Roxi', 'roxika@example.com', '$2y$10$uOs83hsd5foUeKZHGmdDyugRH3nDupD4F2pCFzhYOWoZS.n/Cn8Qm', '2025-02-03 17:11:24', '2025-02-03 17:11:24', 0),
(8, 'Gábor', 'gabor@example.com', '$2y$10$YXpO57Pt7E2ivOd2gLkFNOD5IaolwVaT7Oii/cYzVDqf/Z1MpqajW', '2025-02-03 17:14:11', '2025-02-03 17:14:11', 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`user_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
