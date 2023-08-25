-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 13, 2023 lúc 06:50 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `linhg_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `blog_category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(20) DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `blog_category_id`, `title`, `slug`, `view`, `image`, `summary`, `content`, `featured`, `created_at`, `updated_at`) VALUES
(11, NULL, 7, '10 xiêm y ấn tượng thảm xanh Ngôi sao của năm 2022', '10-xiem-y-an-tuong-tham-xanh-ngoi-sao-cua-nam-2022', 38, '10-xiem-y-an-tuong-tham-xanh-ngoi-sao-cua-nam-2022.jpg', 'Suit hở ngực của Thanh Hằng, jumpsuit đính Swarovski của H\'Hen Niê... gây ấn tượng trong gala trao giải Ngôi sao của năm 2022 tối 1/11.', '<p><img alt=\"\" src=\"https://i1-ngoisao.vnecdn.net/2023/01/12/tham-do-ngoi-sao-cua-nam-2022-1-1673496662.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=BOMl481t7Qyn7U0kwlHv8Q\" /></p>\n\n<p>Thanh Hằng chọn trang phục suit ph&aacute; c&aacute;ch của NTK C&ocirc;ng Tr&iacute;. Trang phục phom d&aacute;ng oversized kết hợp nội y nhỏ x&iacute;u, t&ocirc;n l&ecirc;n vẻ quyền lực của si&ecirc;u mẫu.</p>\n\n<p><img alt=\"\" src=\"https://i1-ngoisao.vnecdn.net/2023/01/12/tham-do-ngoi-sao-cua-nam-2022-3-1673496662.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=2yl5qAqBIMlbUeJ_TwBB3A\" /></p>\n\n<p>H&#39;Hen Ni&ecirc; diện bộ c&aacute;nh s&aacute;ng tạo nằm trong bộ sưu tập &#39;Sa vũ&#39; của NTK L&ecirc; Thanh H&ograve;a. Kiểu d&aacute;ng jumpsuit tr&ecirc;n nền chất liệu vải xuy&ecirc;n thấu kết hợp kỹ thuật đ&iacute;nh kết đ&aacute; Swarovski tạo th&agrave;nh tua rua bắt mắt. Nh&agrave; thiết kế phối hợp ch&acirc;n v&aacute;y mini hiện đại với đu&ocirc;i v&aacute;y d&agrave;i bồng bềnh, khơi gợi vẻ đẹp của đồi c&aacute;t tr&ecirc;n sa mạc.</p>\n\n<p><img alt=\"\" src=\"https://i1-ngoisao.vnecdn.net/2023/01/12/tham-do-ngoi-sao-cua-nam-2022-4-1673496663.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=4Ki2vC1_GiAdzT0tBIHEFQ\" /></p>\n\n<p>Ninh Dương Lan Ngọc khoe v&ograve;ng một đầy c&ugrave;ng chiếc v&aacute;y trễ nải t&ocirc;ng silver, một trong ba dresscode của chương tr&igrave;nh. Trang phục l&agrave;m từ chất liệu &aacute;nh kim đặc biệt với những khoảng hở ở eo, gi&uacute;p nữ diễn vi&ecirc;n th&ecirc;m mảnh mai.</p>\n\n<p><img alt=\"\" src=\"https://i1-ngoisao.vnecdn.net/2023/01/12/tham-do-ngoi-sao-cua-nam-2022-5-1673496664.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=z_mEmJuRLZv6DZYgcYQ5NQ\" /></p>\n\n<p>Angela Phương Trinh tỏa s&aacute;ng như nữ thần c&ugrave;ng đầm C&ocirc;ng Tr&iacute;. Thiết kế sử dụng chất liệu voan mềm mại tạo kiểu bất đối xứng, kết hợp kỹ thuật đ&iacute;nh kết đ&aacute; c&ocirc;ng phu. Nữ diễn vi&ecirc;n kết hợp lối trang điểm đ&iacute;nh kết l&ocirc;ng vũ tăng độ ấn tượng.</p>\n\n<p><img alt=\"\" src=\"https://i1-ngoisao.vnecdn.net/2023/01/12/tham-do-ngoi-sao-cua-nam-2022-6-1673496664.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=3-AAMQhYy0cUzAkWBAFzNg\" /></p>\n\n<p>Đảm nhiệm vai tr&ograve; MC cho gala trao giải, Thanh Thanh Huyền khoe đ&ocirc;i ch&acirc;n thon d&agrave;i c&ugrave;ng chiếc đầm Nguyễn Minh Tuấn. Trang phục đ&iacute;nh kết đ&aacute; lấp l&aacute;nh kết hợp phần t&agrave; sau bay bổng, gi&uacute;p người đẹp tr&ocirc;ng vừa quyến rũ, vừa nữ t&iacute;nh.</p>\n\n<p><img alt=\"\" src=\"https://i1-ngoisao.vnecdn.net/2023/01/12/tham-do-ngoi-sao-cua-nam-2022-7-1673496666.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=utwf7tF_JiJOWJffFNVXtA\" /></p>\n\n<p>Đầm silver với những khoảng hở t&aacute;o bạo l&agrave;m nổi bật đường cong gợi cảm của Diễm My 9X. Trang phục c&oacute; phom d&aacute;ng c&uacute;p ngực, xẻ t&agrave; cao, đ&iacute;nh kết đ&aacute; lấp l&aacute;nh tr&ecirc;n nền chất liệu xuy&ecirc;n thấu mềm mại. Diễm My thể hiện sự tinh tế khi kết hợp trang sức v&agrave; gi&agrave;y ton-sur-ton.</p>\n\n<p><img alt=\"\" src=\"https://i1-ngoisao.vnecdn.net/2023/01/12/325257978-901549714287318-2187181620830114852-n.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=i6uFD5b6agZ90h8pg561Ig\" /></p>\n\n<p>Đầm hở bạo của NTK H&agrave; Thanh Huy được Anh Thư sử dụng tr&ecirc;n thảm đỏ sự kiện Ng&ocirc;i sao của năm 2022. Nhờ c&oacute; body săn chắc ở tuổi 40, si&ecirc;u mẫu chinh phục được kiểu v&aacute;y cut-out ở ngực v&agrave; eo, kết hợp phần t&agrave; xẻ cao v&uacute;t.</p>\n\n<p><img alt=\"\" src=\"https://i1-ngoisao.vnecdn.net/2023/01/12/tham-do-ngoi-sao-cua-nam-2022-12-1673496667.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=E6POFbed78l-uP9aPyE8lA\" /></p>\n\n<p>V&otilde; Ho&agrave;ng Yến diện t&ocirc;ng blue theo dresscode của chương tr&igrave;nh. Trang phục kh&aacute;c biệt phong c&aacute;ch thường thấy của si&ecirc;u mẫu với chi tiết &aacute;o kho&aacute;c bồng tay độc đ&aacute;o. Phom đầm đu&ocirc;i c&aacute; t&ocirc;n đường cong c&ugrave;ng v&oacute;c d&aacute;ng mảnh mai của người đẹp.</p>\n\n<p><img alt=\"\" src=\"https://i1-ngoisao.vnecdn.net/2023/01/12/tham-do-ngoi-sao-cua-nam-2022-13-1673496669.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=xvvGzLPHvZtRy_VORaTJAg\" /></p>\n\n<p>Nhận giải thưởng &#39;Fashion Icon&#39; trong đ&ecirc;m trao giải, Thảo Nhi L&ecirc; diện v&aacute;y satin đắp ren gợi cảm. Đ&acirc;y l&agrave; phong c&aacute;ch &#39;biến thời trang ph&ograve;ng ngủ th&agrave;nh đồ đi tiệc&#39;, thường được &aacute; hậu ứng dụng tr&ecirc;n c&aacute;c sự kiện để chứng minh gu thời trang ri&ecirc;ng biệt.</p>\n\n<p><img alt=\"\" src=\"https://i1-ngoisao.vnecdn.net/2023/01/12/tham-do-ngoi-sao-cua-nam-2022-2-1673497663.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=yehVpJu_qkkS-BdqBFrUug\" /></p>\n\n<p>Kh&aacute;nh My diện v&aacute;y của NTK Nguyễn Tiến Truyển c&oacute; t&ecirc;n gọi &#39;Sun Goddess&#39;, với cảm hứng từ nữ thần mặt trời. Thiết kế v&aacute;y đu&ocirc;i c&aacute; tr&ecirc;n nền chất liệu xuy&ecirc;n thấu t&aacute;o bạo với h&agrave;ng ng&agrave;n hạt cườm &oacute;ng &aacute;nh được xử l&yacute; thủ c&ocirc;ng bằng tay, ph&ugrave; hợp với vẻ sexy của Kh&aacute;nh My.</p>\n\n<p><img alt=\"\" src=\"https://i1-ngoisao.vnecdn.net/2023/01/12/324243783-2411981975618353-8196943627266452904-n-1673511695.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=jRLDBNCVe-RdlSkRWJ2rCQ\" /></p>\n\n<p>Hoa hậu Tiểu Vy xuất hiện với diện mạo trẻ trung trong một thiết kế m&agrave;u xanh pastel chủ đạo, được lấy cảm hứng từ m&agrave;u sắc của logo b&aacute;o Ng&ocirc;i Sao. Chất liệu lụa cao cấp được L&ecirc; Thanh H&ograve;a sử dụng với kiểu d&aacute;ng crop top trễ vai kết hợp ch&acirc;n v&aacute;y, đ&uacute;ng với phong c&aacute;ch tươi mới của n&agrave;ng hậu sinh năm 2000.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Trang Shaelyn</strong></p>', 1, '2023-01-14 11:20:25', '2023-03-13 08:42:49'),
(14, NULL, 8, 'Những cách mix đồ màu trắng \"bao đẹp, bao sang chảnh\"', 'nhung-cach-mix-do-mau-trang-bao-dep-bao-sang-chanh', 18, 'nhung-cach-mix-do-mau-trang-bao-dep-bao-sang-chanh.jpg', 'Nếu muốn diện đồ tông trắng thần thái hơn, khí chất hơn trong mùa lạnh thì bạn hãy tham khảo các cách sau.', '<p><strong>1. Mix đồ họa tiết</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Những cách mix đồ màu trắng &amp;#34;bao đẹp, bao sang chảnh&amp;#34; - 1\" src=\"https://cdn.24h.com.vn/upload/1-2023/images/2023-02-21/9-cach-mix-do-mau-trang-bao-dep-bao-sang-chanh-1-1676955742-96-width1200height1566.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&aacute;ch dễ nhất để diện đồ trắng từ đầu đến ch&acirc;n m&agrave; kh&ocirc;ng nh&agrave;m ch&aacute;n ch&iacute;nh l&agrave; phối họa tiết. Bạn c&oacute; thể chọn trang phục dệt kim c&oacute; đường g&acirc;n tr&ecirc;n vải lụa lấp l&aacute;nh hoặc một chiếc quần vải tu&yacute;t c&oacute; điểm nhấn l&ocirc;ng cừu để tạo th&ecirc;m chiều s&acirc;u cho trang phục đơn sắc. Ngo&agrave;i ra, chị em c&oacute; thể chọn đồ trắng c&oacute; họa tiết&nbsp;chấm bi thu nhỏ, sọc mỏng hoặc thậm ch&iacute; c&oacute; thể l&agrave; những nụ hoa nhỏ chỉ để tạo cảm gi&aacute;c kh&aacute;c biệt.</p>\r\n\r\n<p><strong>2. Diện suit trắng</strong></p>\r\n\r\n<p><img alt=\"Những cách mix đồ màu trắng &amp;#34;bao đẹp, bao sang chảnh&amp;#34; - 2\" src=\"https://cdn.24h.com.vn/upload/1-2023/images/2023-02-21/9-cach-mix-do-mau-trang-bao-dep-bao-sang-chanh-h-1676955943-875-width683height906.jpg\" /></p>\r\n\r\n<p>Nếu bạn muốn diện một bộ trang phục ho&agrave;n chỉnh th&igrave; n&ecirc;n đầu tư v&agrave;o một bộ suit trắng sang trọng. Cho d&ugrave; bạn kết hợp n&oacute; với những m&oacute;n đồ m&agrave;u trắng nhạt b&oacute;ng bẩy kh&aacute;c, chẳng hạn như &aacute;o cao cổ v&agrave; gi&agrave;y mules, hoặc chọn kết hợp với một số m&agrave;u trắng tinh tươi s&aacute;ng th&igrave; cũng đều ph&ugrave; hợp.</p>\r\n\r\n<p><strong>3. Ch&uacute; &yacute; v&agrave;o tỷ lệ</strong></p>\r\n\r\n<p><img alt=\"Những cách mix đồ màu trắng &amp;#34;bao đẹp, bao sang chảnh&amp;#34; - 3\" src=\"https://cdn.24h.com.vn/upload/1-2023/images/2023-02-21/9-cach-mix-do-mau-trang-bao-dep-bao-sang-chanh-tu-hao-1-1593222852-1676960721-282-width1000height1029.jpg\" /></p>\r\n\r\n<p>H&atilde;y ch&uacute; &yacute; đến tỉ lệ khi diện sắc trắng, đặc biệt l&agrave; &ldquo;c&acirc;y trắng&rdquo; để cơ thể kh&ocirc;ng bị to hoặc nuốt d&aacute;ng. Chị em h&atilde;y thử một chiếc &aacute;o kho&aacute;c với quần jean ống loe hoặc một chiếc &aacute;o đan len qu&aacute; khổ với quần legging &ocirc;m s&aacute;t để c&oacute; hiệu ứng tổng thể th&uacute; vị hơn nhiều. Quy tắc đơn giản ở đ&acirc;y l&agrave; chỉ n&ecirc;n c&oacute; một m&oacute;n đồ rộng: v&iacute; dụ &aacute;o rộng th&igrave; quần &ocirc;m, quần rộng th&igrave; &aacute;o phải b&oacute; mới t&ocirc;n d&aacute;ng.</p>\r\n\r\n<p><strong>4. Mặc quần d&aacute;ng rộng</strong></p>\r\n\r\n<p><img alt=\"Những cách mix đồ màu trắng &amp;#34;bao đẹp, bao sang chảnh&amp;#34; - 4\" src=\"https://cdn.24h.com.vn/upload/1-2023/images/2023-02-21/9-cach-mix-do-mau-trang-bao-dep-bao-sang-chanh-5-1676955742-140-width511height618.jpg\" /></p>\r\n\r\n<p>Quần jean skinny trắng si&ecirc;u b&oacute; hiếm khi tr&ocirc;ng đẹp bằng quần jean xanh hoặc đen, đ&oacute; l&agrave; l&yacute; do tại sao bạn n&ecirc;n mặc quần ống đứng, ống su&ocirc;ng hoặc thậm ch&iacute; l&agrave; ống rộng m&agrave;u trắng. Mặt kh&aacute;c, mặc quần trắng d&aacute;ng rộng cũng kh&ocirc;ng dễ bị lộ nội y như quần b&oacute;.</p>\r\n\r\n<p><strong>5. Lựa chọn phụ kiện kim loại</strong></p>\r\n\r\n<p><img alt=\"Những cách mix đồ màu trắng &amp;#34;bao đẹp, bao sang chảnh&amp;#34; - 5\" src=\"https://cdn.24h.com.vn/upload/1-2023/images/2023-02-21/9-cach-mix-do-mau-trang-bao-dep-bao-sang-chanh-7-1676955742-604-width484height612.jpg\" /></p>\r\n\r\n<p>Khi diện trang phục m&agrave;u trắng v&agrave;o m&ugrave;a đ&ocirc;ng, chị em n&ecirc;n ưu ti&ecirc;n phụ kiện m&agrave;u bạc để outfit tr&ocirc;ng sang trọng hơn khi ch&uacute;ng kết hợp với nhau. Nhưng đừng băn khoăn nếu bản th&acirc;n th&iacute;ch phụ kiện m&agrave;u v&agrave;ng gold hơn v&igrave; về cơ bản, bất kỳ m&agrave;u &aacute;nh kim n&agrave;o cũng sẽ mang lại vẻ kh&iacute; chất cho vẻ ngo&agrave;i khi mix với đồ trắng.</p>\r\n\r\n<p><strong>6. Thử jumpsuit hoặc playsuit</strong></p>\r\n\r\n<p><img alt=\"Những cách mix đồ màu trắng &amp;#34;bao đẹp, bao sang chảnh&amp;#34; - 6\" src=\"https://cdn.24h.com.vn/upload/1-2023/images/2023-02-21/9-cach-mix-do-mau-trang-bao-dep-bao-sang-chanh-8-1676955742-4-width513height644.jpg\" /></p>\r\n\r\n<p>Khi ph&acirc;n v&acirc;n kh&ocirc;ng biết mặc g&igrave;, bạn c&oacute; thể mặc một bộ &aacute;o liền quần m&agrave;u trắng kết hợp&nbsp; với những m&oacute;n đồ đơn giản, cổ điển như gi&agrave;y bốt mũi nhọn, t&uacute;i mini c&oacute; quai tr&ecirc;n c&ugrave;ng hoặc khuy&ecirc;n tai dạng v&ograve;ng.</p>\r\n\r\n<p><strong>7. Phối điểm nhấn m&agrave;u be</strong></p>\r\n\r\n<p><img alt=\"Những cách mix đồ màu trắng &amp;#34;bao đẹp, bao sang chảnh&amp;#34; - 7\" src=\"https://cdn.24h.com.vn/upload/1-2023/images/2023-02-21/9-cach-mix-do-mau-trang-bao-dep-bao-sang-chanh-9-1676955742-86-width484height626.jpg\" /></p>\r\n\r\n<p>Nếu bạn lo lắng một bộ quần &aacute;o to&agrave;n m&agrave;u trắng sẽ khiến bạn lạc l&otilde;ng, h&atilde;y thử th&ecirc;m một v&agrave;i điểm nhấn m&agrave;u be ấm hoặc n&acirc;u nhạt bằng một số đ&ocirc;i bốt cao đến đầu gối, thắt lưng da hoặc &aacute;o len.</p>\r\n\r\n<p><strong>8. Đừng qu&aacute; cầu kỳ trong việc kết hợp ch&iacute;nh x&aacute;c</strong></p>\r\n\r\n<p><img alt=\"Những cách mix đồ màu trắng &amp;#34;bao đẹp, bao sang chảnh&amp;#34; - 8\" src=\"https://cdn.24h.com.vn/upload/1-2023/images/2023-02-21/9-cach-mix-do-mau-trang-bao-dep-bao-sang-chanh-chau-bui-1593222848-1676960721-874-width1000height1275.jpg\" /></p>\r\n\r\n<p>Đ&uacute;ng vậy, một bộ đồ ho&agrave;n hảo gồm những m&oacute;n đồ m&agrave;u trắng m&ugrave;a đ&ocirc;ng sẽ tr&ocirc;ng rất đẹp, nhưng khi kết hợp m&agrave;u trắng với c&aacute;c m&agrave;u kh&aacute;c cũng đẹp kh&ocirc;ng k&eacute;m. Điều quan trọng l&agrave; chọn c&aacute;c m&agrave;u đủ kh&aacute;c biệt để tr&ocirc;ng nổi bật hẳn chứ kh&ocirc;ng phải c&aacute;c t&ocirc;ng na n&aacute; nhau v&igrave; khiến set đồ trong k&eacute;m sang.</p>\r\n\r\n<p>Bạn c&oacute; thể chọn bốt da rắn hoặc &aacute;o len đan m&agrave;u sắc cũng c&oacute; thể gi&uacute;p kết hợp nhiều m&agrave;u trắng kh&aacute;c lại với nhau một c&aacute;ch ho&agrave;n hảo.</p>\r\n\r\n<p><strong>9. H&atilde;y thử một số m&oacute;n đồ hợp thời trang</strong></p>\r\n\r\n<p><img alt=\"Những cách mix đồ màu trắng &amp;#34;bao đẹp, bao sang chảnh&amp;#34; - 9\" src=\"https://cdn.24h.com.vn/upload/1-2023/images/2023-02-21/9-cach-mix-do-mau-trang-bao-dep-bao-sang-chanh-mix-gile-vo----i-so---mi-gia----u-qua----n-1676955943-451-width588height603.jpg\" /></p>\r\n\r\n<p>&Aacute;o len ghi-l&ecirc; đ&atilde; ch&iacute;nh thức chuyển th&agrave;nh item chủ lực trong tủ quần &aacute;o, v&igrave; vậy bạn n&ecirc;n c&oacute; một chiếc gile trong tủ đồ. Ngo&agrave;i ra, lựa chọn c&aacute;c m&oacute;n đồ m&agrave;u trắng trong m&ugrave;a lạnh c&oacute; kiểu d&aacute;ng đẹp, dễ kết hợp v&agrave; tạo cảm gi&aacute;c sang trọng hơn như blazer, &aacute;o cardigan hoặc &aacute;o kho&aacute;c d&aacute;ng d&agrave;i cũng l&agrave; gợi &yacute; bạn n&ecirc;n thử.</p>', 0, '2023-02-23 03:23:21', '2023-03-11 16:07:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `lang`, `name`, `slug`, `featured`, `created_at`, `updated_at`) VALUES
(7, 'vi', 'Showbiz Việt', 'showbiz-viet', 1, '2023-01-08 08:32:53', '2023-01-14 11:15:59'),
(8, 'vi', 'Phong cách', 'phong-cach', 1, '2023-02-23 03:46:17', '2023-03-11 15:36:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `messages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `user_id`, `messages`, `featured`, `created_at`, `updated_at`) VALUES
(22, 11, 2, 'Test 14', 1, '2023-03-07 05:18:15', '2023-03-07 05:18:15'),
(23, 11, 2, 'mới nhất', 1, '2023-03-07 05:20:38', '2023-03-07 05:20:38'),
(24, 14, 2, 'Bình luận', 1, '2023-03-07 07:32:46', '2023-03-07 07:32:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `featured`, `created_at`, `updated_at`) VALUES
(1, 'Calvin Klein', 'calvin-klein', 1, NULL, '2023-01-05 01:33:22'),
(2, 'Diesel', 'diesel', 1, NULL, NULL),
(3, 'Couple TX', 'couple-tx', 1, '2023-01-14 07:30:18', '2023-03-11 15:12:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(155) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `town` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `town`, `city`, `created_at`, `updated_at`) VALUES
(46, 'Linh', 'Văn', 'linhbq89@gmail.com', '0378239412', 'Go Vap', 'HCM', 'HCM', '2023-03-10 02:40:15', '2023-03-10 02:40:15'),
(48, 'Linh', 'Văn', 'linhbq89@gmail.com', '0378239412', 'Go Vap', 'HCM', 'HCM', '2023-03-10 03:08:43', '2023-03-10 03:08:43'),
(49, 'Linh', 'Văn', 'linhbq89@gmail.com', '0378239412', 'Go Vap', 'HCM', 'HCM', '2023-03-10 09:17:16', '2023-03-10 09:17:16'),
(50, 'Linh', 'Văn', 'linhbq89@gmail.com', '0378239412', 'Go Vap', 'HCM', 'HCM', '2023-03-10 09:17:39', '2023-03-10 09:17:39'),
(58, 'ADMIN', 'Linh', 'linhbq89@gmail.com', '0337229661', 'HCM', 'Hồ Chí Minh', 'Hồ Chí Minh', '2023-03-10 15:35:15', '2023-03-10 15:35:15'),
(59, 'ADMIN', 'Linh', 'linhbq89@gmail.com', '0337229661', 'HCM', 'Hồ Chí Minh', 'Hồ Chí Minh', '2023-03-12 02:40:31', '2023-03-12 02:40:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mail_contact`
--

CREATE TABLE `mail_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_08_155610_create_permission_tables', 1),
(6, '2022_12_16_091924_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(19, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(8, 'App\\Models\\User', 4),
(8, 'App\\Models\\User', 3),
(17, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ xác nhận',
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `order_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_status`, `order_code`, `total`, `order_note`, `admin_note`, `created_at`, `updated_at`) VALUES
(39, 46, 'Đã hoàn thành', 'DHGZMRR0', 510000, NULL, NULL, '2023-03-10 02:40:15', '2023-03-11 14:07:26'),
(40, 48, 'Chờ xác nhận', 'XRLZNHJN', 650000, 'Ghi chú', NULL, '2023-03-10 03:15:09', '2023-03-10 03:15:09'),
(41, 49, 'Chờ xác nhận', 'FLSLF9HU', 510000, NULL, NULL, '2023-03-10 09:17:16', '2023-03-10 09:17:16'),
(42, 50, 'Chờ xác nhận', '2ABPIPOK', 510000, NULL, NULL, '2023-03-10 09:17:39', '2023-03-10 09:17:39'),
(50, 58, 'Đã hoàn thành', 'YXB14JE8', 510000, NULL, NULL, '2023-03-10 15:35:15', '2023-03-15 08:37:54'),
(51, 59, 'Chờ xác nhận', 'LZGMHM5O', 510000, NULL, NULL, '2023-03-12 02:40:31', '2023-03-12 02:40:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `size`, `color`, `qty`, `created_at`, `updated_at`) VALUES
(28, 39, 40, 'XS', 'Blue', 1, '2023-03-10 02:40:15', '2023-03-10 02:40:15'),
(29, 40, 43, 'S', 'Đỏ', 1, '2023-03-10 03:15:09', '2023-03-10 03:15:09'),
(30, 41, 40, 'XL', 'Vàng-Cam', 1, '2023-03-10 09:17:16', '2023-03-10 09:17:16'),
(31, 42, 40, 'XL', 'Vàng-Cam', 1, '2023-03-10 09:17:39', '2023-03-10 09:17:39'),
(32, 43, 40, 'XL', 'Vàng-Cam', 1, '2023-03-10 09:18:09', '2023-03-10 09:18:09'),
(33, 43, 38, 'XS', 'Xanh đen', 1, '2023-03-10 09:18:10', '2023-03-10 09:18:10'),
(34, 44, 40, 'XL', 'Vàng-Cam', 1, '2023-03-10 09:18:52', '2023-03-10 09:18:52'),
(35, 44, 38, 'XS', 'Xanh đen', 1, '2023-03-10 09:18:52', '2023-03-10 09:18:52'),
(36, 45, 40, 'XL', 'Vàng-Cam', 1, '2023-03-10 09:19:06', '2023-03-10 09:19:06'),
(37, 45, 38, 'XS', 'Xanh đen', 1, '2023-03-10 09:19:06', '2023-03-10 09:19:06'),
(45, 50, 40, 'XL', 'Vàng-Cam', 1, '2023-03-10 15:35:15', '2023-03-10 15:35:15'),
(46, 51, 40, 'XL', 'Vàng-Cam', 1, '2023-03-12 02:40:31', '2023-03-12 02:40:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(9, 'products list', 'web', '2023-03-11 14:23:27', '2023-03-11 15:26:55'),
(10, 'products detail', 'web', '2023-03-11 14:33:14', '2023-03-11 15:27:05'),
(11, 'products category', 'web', '2023-03-11 14:33:23', '2023-03-11 15:27:11'),
(12, 'products brand', 'web', '2023-03-11 14:33:31', '2023-03-11 15:27:20'),
(13, 'products comment', 'web', '2023-03-11 14:33:40', '2023-03-11 15:27:27'),
(14, 'blogs list', 'web', '2023-03-11 15:20:44', '2023-03-11 15:27:32'),
(15, 'blog add', 'web', '2023-03-11 15:21:39', '2023-03-11 15:27:40'),
(16, 'blog category', 'web', '2023-03-11 15:22:29', '2023-03-11 15:27:49'),
(17, 'blog comment', 'web', '2023-03-11 15:22:39', '2023-03-11 15:27:59'),
(18, 'order processing', 'web', '2023-03-11 15:23:17', '2023-03-11 15:28:06'),
(19, 'order finished', 'web', '2023-03-11 15:23:32', '2023-03-13 05:19:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `discount` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `brand_id`, `product_category_id`, `name`, `slug`, `description`, `content`, `price`, `discount`, `weight`, `sku`, `featured`, `created_at`, `updated_at`) VALUES
(36, 3, 3, 'Áo khoác Nam Basic Dây Kéo Kim Loại MOP 1032', 'ao-khoac-nam-basic-day-keo-kim-loai-mop-1032', NULL, '', 490000, 579000, NULL, 'MOP 1032', 1, '2023-01-14 08:10:55', '2023-03-15 07:55:36'),
(37, 3, 6, 'Quần dài Nam Jeans Co Giãn MJE 1017', 'quan-dai-nam-jeans-co-gian-mje-1017', NULL, '', 550000, 650000, NULL, 'MJE 1017', 1, '2023-01-14 08:46:55', '2023-01-17 06:07:56'),
(38, 3, 7, 'Áo thun Nữ Cutout Tay Dài WTS 2236', 'ao-thun-nu-cutout-tay-dai-wts-2236', NULL, '', 254000, 299000, NULL, 'WTS 2236', 1, '2023-01-14 09:03:45', '2023-02-03 16:13:01'),
(39, 3, 5, 'Áo Thun Nam Regular In Potential MTS 1225', 'ao-thun-nam-regular-in-potential-mts-1225', NULL, '', 255000, 299000, NULL, 'MTS 1225', 1, '2023-01-14 09:09:52', '2023-01-22 01:24:43'),
(40, 3, 8, 'Quần Jean Nữ Skinny Jeans Wash WJE 2016', 'quan-jean-nu-skinny-jeans-wash-wje-2016', NULL, '', 510000, 600000, NULL, 'WJE 2016', 1, '2023-01-14 09:12:15', '2023-03-12 02:19:57'),
(43, 3, 9, 'Áo Khoác Nữ Khakis Túi Đắp WOF 2030', 'ao-khoac-nu-khakis-tui-dap-wof-2030', 'Sử dụng hàng ngày khi ra ngoài\nDễ dàng kêt hợp đi làm, đi cafe - dạo phố, đi du lịch', 'Áo Khoác Nữ Khakis Túi Đắp WOF 2030.  Áo khoác Khaki xớ lớn, form oversize thời trang. Áo thân trước may 2 túi đắp có thể xỏ tay từ cạnh túi vào và 2 túi chìm may ăn vô coupe sườn. Áo được wash đường ngấn cánh gián đậm nhạt thời trang dọc theo các đường diễu.\n\nChất liệu: - Màu Vàng, Be và Hồng : vải kakis xớ lớn, thành phần 100% cotton.\n                - Màu Đen : Denim, thành phần 100% cotton.\nForm dáng: Oversize \nMàu sắc: Be, Vàng, Hồng\nSản xuất: Việt Nam', 650000, NULL, NULL, 'WOF 2030', 1, '2023-01-30 11:06:50', '2023-03-12 02:19:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `sex`, `featured`, `created_at`, `updated_at`) VALUES
(2, 'Quần kaki', 'quan-kaki', 'men', 1, '2023-01-11 07:20:12', '2023-01-17 16:24:56'),
(3, 'Áo khoác', 'ao-khoac', 'men', 1, '2023-01-14 07:30:44', '2023-01-30 11:04:58'),
(4, 'Quần jean', 'quan-jean', 'men', 1, '2023-01-14 09:17:54', '2023-01-17 16:24:42'),
(5, 'Áo thun nam', 'ao-thun-nam', 'men', 0, '2023-01-14 09:18:22', '2023-02-23 03:18:56'),
(6, 'Quần dài', 'quan-dai', 'men', 0, '2023-01-14 09:20:04', '2023-03-11 15:07:38'),
(7, 'Áo thun nữ', 'ao-thun-nu', 'women', 1, '2023-01-17 16:19:56', '2023-02-18 08:24:07'),
(8, 'Quần jean nữ', 'quan-jean-nu', 'women', 1, '2023-01-17 16:50:32', '2023-02-18 08:24:07'),
(9, 'Áo khoác nữ', 'ao-khoac-nu', 'women', 1, '2023-02-17 03:05:37', '2023-02-18 08:24:06'),
(10, 'Quần dài nam', 'quan-dai-nam', 'men', 0, '2023-02-18 08:23:03', '2023-03-11 15:07:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comments`
--

CREATE TABLE `product_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `messages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `messages`, `featured`, `created_at`, `updated_at`) VALUES
(9, 36, 2, 'Bình luận con ', 1, '2023-03-07 08:19:03', '2023-03-11 15:15:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `color`, `color_code`, `size`, `qty`, `created_at`, `updated_at`) VALUES
(3, 43, 'Vàng', '#e0ee11', 'XS', 0, '2023-02-21 13:44:18', '2023-03-13 02:55:32'),
(4, 43, 'Đỏ', '#ce1c1c', 'S', 0, '2023-02-21 14:02:54', '2023-03-13 02:55:37'),
(6, 40, 'Blue', '#3237b3', 'XS', 10, '2023-02-22 14:58:28', '2023-03-12 03:20:15'),
(7, 36, 'Hồng', '#d322ac', 'M', 100, '2023-02-23 14:05:35', '2023-02-23 14:05:35'),
(8, 37, 'Orange', '#e99c16', 'L', 200, '2023-02-23 14:06:02', '2023-02-23 14:06:02'),
(9, 38, 'Xanh đen', '#162664', 'XS', 12, '2023-02-23 14:06:32', '2023-03-12 03:20:30'),
(10, 40, 'Vàng-Cam', '#bab52c', 'XL', 2, '2023-02-23 14:07:04', '2023-03-12 02:40:31'),
(11, 39, 'Đỏ', '#f41010', 'XL', 12, '2023-02-23 14:32:59', '2023-03-12 03:20:38'),
(12, 36, 'Orange', '#db720f', 'M', 10, '2023-02-26 02:52:06', '2023-03-12 03:20:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
(5, 36, 'product-36-0.webp', '2023-01-14 08:10:55', '2023-01-14 08:10:55'),
(6, 36, 'product-36-1.webp', '2023-01-14 08:10:55', '2023-01-14 08:10:55'),
(7, 36, 'product-36-2.webp', '2023-01-14 08:10:55', '2023-01-14 08:10:55'),
(8, 36, 'product-36-3.webp', '2023-01-14 08:10:55', '2023-01-14 08:10:55'),
(9, 37, 'product-37-0.webp', '2023-01-14 08:46:55', '2023-01-14 08:46:55'),
(10, 37, 'product-37-1.webp', '2023-01-14 08:46:55', '2023-01-14 08:46:55'),
(11, 37, 'product-37-2.webp', '2023-01-14 08:46:55', '2023-01-14 08:46:55'),
(12, 37, 'product-37-3.jpg', '2023-01-14 08:46:55', '2023-01-14 08:46:55'),
(13, 37, 'product-37-4.jpg', '2023-01-14 08:46:55', '2023-01-14 08:46:55'),
(14, 38, 'product-38-0.webp', '2023-01-14 09:03:45', '2023-01-14 09:03:45'),
(15, 38, 'product-38-1.jpg', '2023-01-14 09:03:45', '2023-01-14 09:03:45'),
(16, 38, 'product-38-2.webp', '2023-01-14 09:03:45', '2023-01-14 09:03:45'),
(17, 38, 'product-38-3.webp', '2023-01-14 09:03:45', '2023-01-14 09:03:45'),
(18, 39, 'product-39-0.webp', '2023-01-14 09:09:52', '2023-01-14 09:09:52'),
(19, 39, 'product-39-1.webp', '2023-01-14 09:09:52', '2023-01-14 09:09:52'),
(20, 39, 'product-39-2.webp', '2023-01-14 09:09:52', '2023-01-14 09:09:52'),
(21, 39, 'product-39-3.webp', '2023-01-14 09:09:52', '2023-01-14 09:09:52'),
(22, 40, 'product-40-0.webp', '2023-01-14 09:12:15', '2023-01-14 09:12:15'),
(23, 40, 'product-40-1.webp', '2023-01-14 09:12:15', '2023-01-14 09:12:15'),
(24, 40, 'product-40-2.webp', '2023-01-14 09:12:15', '2023-01-14 09:12:15'),
(36, 43, 'product-43-0.webp', '2023-01-30 11:07:41', '2023-01-30 11:07:41'),
(37, 43, 'product-43-1.webp', '2023-01-30 11:07:41', '2023-01-30 11:07:41'),
(38, 43, 'product-43-2.webp', '2023-01-30 11:07:41', '2023-01-30 11:07:41'),
(39, 43, 'product-43-3.jpg', '2023-01-30 11:07:41', '2023-01-30 11:07:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2023-01-11 09:12:17', '2023-01-11 09:12:17'),
(3, 'user', 'web', '2023-01-11 09:12:17', '2023-01-11 09:12:17'),
(8, 'admin', 'web', '2023-03-11 04:33:12', '2023-03-11 04:33:12'),
(9, 'manager-orders-full', 'web', '2023-03-11 05:06:49', '2023-03-13 09:50:04'),
(10, 'manager-products-full', 'web', '2023-03-11 07:55:52', '2023-03-13 09:49:03'),
(11, 'manager-blogs-full', 'web', '2023-03-11 08:06:00', '2023-03-13 09:49:54'),
(12, 'manager-product', 'web', '2023-03-13 09:46:30', '2023-03-15 07:37:59'),
(14, 'manager-product-comment', 'web', '2023-03-13 09:51:35', '2023-03-13 09:51:35'),
(15, 'manager-blog', 'web', '2023-03-13 09:52:22', '2023-03-13 09:52:22'),
(16, 'manager-blog-comment', 'web', '2023-03-13 09:52:33', '2023-03-13 09:52:33'),
(17, 'manager-orders', 'web', '2023-03-15 07:45:20', '2023-03-15 07:45:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(9, 10),
(10, 10),
(11, 10),
(12, 10),
(13, 10),
(15, 11),
(16, 11),
(17, 11),
(18, 9),
(19, 9),
(17, 14),
(14, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `customer_id`, `avatar`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, NULL, 'admin-giang-linh.jpg', 'Giang Văn Linh', 'admin@localhost.com', NULL, '$2y$10$FLCuqiy8YevLjBpdMoxBiO/YRylqvFckfWrk0DCrNAGOlh7omQdlq', 'lIZkvJ7kNI612dSsmiZbspPLXINodQm2v5Kp8GYbUh96B8j6jvN4ahEY9w1R', '2023-01-08 16:13:36', '2023-02-23 13:02:05'),
(3, NULL, 'avatar.png', 'Giang Linh', 'linhbq89@gmail.com', NULL, '$2y$10$i973cVgRBKj34yWDx3Yd3eN8Kg7mm6uihrUvVSNkTb53D/0gxfLXW', NULL, '2023-01-13 06:30:57', '2023-01-13 06:30:57'),
(4, NULL, 'ngoc-chau.jpg', 'Ngọc Châu', 'vuongchau63@gmail.com', NULL, '$2y$10$xnzwihrNhg4ksJm5gFwAUu7O7CTgcV/BqeN6TxJQd5z2I9ZcPM/Wa', NULL, '2023-03-11 07:45:23', '2023-03-11 07:48:38');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_name_unique` (`name`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `mail_contact`
--
ALTER TABLE `mail_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mail_contact`
--
ALTER TABLE `mail_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
