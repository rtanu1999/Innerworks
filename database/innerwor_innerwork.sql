-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2020 at 10:22 AM
-- Server version: 10.3.23-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `innerwor_innerwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `userid` int(5) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `mobile` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `contactperson` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `noofstaffs` int(20) NOT NULL,
  `noofoffices` int(20) NOT NULL,
  `noofplacements` int(20) NOT NULL,
  `privacy` text NOT NULL,
  `terms` text NOT NULL,
  `comment` varchar(100) NOT NULL,
  `sector` varchar(100) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`userid`, `companyname`, `website`, `mobile`, `address`, `state`, `city`, `postcode`, `contactperson`, `email`, `password`, `noofstaffs`, `noofoffices`, `noofplacements`, `privacy`, `terms`, `comment`, `sector`, `experience`, `keyword`, `image`) VALUES
(2, 'mindwings', 'zz', '8795478512', 'ppp', 'Dadra & Nagar Haveli', ' Luari ', '987589', 'ppppppppp', 'qqqq@gmail.com', '1111', 2, 5, 45, '0', '0', '', '', '', '', ''),
(3, 'innerworkindia.com', 'lll', '8475961254', 'bangolore', 'Chhattisgarh', ' Baikunthpur ', '416210', 'Bela', 'pratiksha@gmail.com', '2222', 85, 55, 125, '0', '0', '', '', '', '', ''),
(5, 'innerworkindia.com', ' tttt', '8475961254', ' bangolore', ' Chhattisgarh', '  Baikunthpur ', ' 41621', ' ggg', 'pratiksha1029@gmail.com', '1029', 2, 23, 51, '0', '0', '', 'Agriculture, Fishing, Forestry', '12', ' IT', ''),
(7, 'xyz', 'xyz', '123', 'xyz', 'Gujarat', ' Bardoli ', '123', 'xyz', 'email@gmail.com', '1234', 12, 12, 12, 'on', 'on', 'xyz', 'Automotive', '4', 'it', '555377657.jpg'),
(8, 'Innerwork soln', '        travels', '123456', '        Innerwork', '        Gujarat', '         Baroda ', '      ', '        Soundarya ', 'soundaryakarli@gmail.com', '123', 12, 12, 12, 'on', 'on', 'null', 'Aerospace', '1', 'it', '1589289742image 2.jpg'),
(9, 'M/S GLOBE HOSPITAL AND PHARMACEUTICAL RESEARCH CENTRE PRIVATE LIMITED', '   https://www.globalhospitalpharma.com/', '7302723988', '   Ward No 13, D1-D2, Pragati Vihar, Civil Lines, Midtown Hotel Gali, Rudrapur-263153, Udham Singh Nagar, Uttarakhand, India', '   Uttaranchal', '    Udham Singh Nagar ', '   263', '   Manager', 'ghaprc@gmail.com', 'Ent@123456', 10, 1, 10, 'on', 'on', 'It is a premier healthcare organization and a leading multispeciality hospital in Rudrapur, Udham Si', 'Hospital, Healthcare', '2', 'Healthcare', 'GlobeHospitalLogo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE `app_users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `location` varchar(100) NOT NULL,
  `isIntern` tinyint(4) NOT NULL,
  `isJob` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`id`, `name`, `email`, `phone`, `password`, `location`, `isIntern`, `isJob`) VALUES
(1, 'Akash Mahapatra', 'mahapatraakash@gmail.com', 7809601401, 'princeprakash', 'Bhubaneswar, Odisha, India', 1, 0),
(3, 'Admin', 'admin@gmail.com', 9876543210, 'admin', 'Admin Nagar', 1, 1),
(11, 'Vishwanath', 'vishwaroop1@gmail.com', 9988776655, 'kamalprakash', 'Dhanbad, Jharkhand', 1, 0),
(12, 'Vivek Anand', 'vivekanand@gmail.com', 8093315699, 'pradhanmantri', 'Bhubaneswar', 1, 0),
(13, 'Surya Singham', 'ngprpk2002@yahoo.com', 7809601401, 'duraisingam', 'Thoothukudi, Tamil Nadu, India', 1, 1),
(14, 'Akash M', 'paliokatu@gmail.com', 9988998899, 'princep', 'Bbsr', 1, 1),
(15, 'Akash M', 'paliokatuu@gmail.com', 9988998899, 'princep', 'Bbsr', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `publishdate` date NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `img`, `status`, `publishdate`, `dateTime`) VALUES
(11, '<font face = \"Monotype Corsiva\" size = \"4\"> Trends In Digital Marketing</font>', '<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\"><strong><font face = \"Monotype Corsiva\" size= \"4\"> Innerwork Digital Marketing</strong> is going to be the real game changer for many business. It is a modern way of promoting a business, if one doesn&rsquo;t join the hands to the following trends, then the business can&rsquo;t think of having a better future</font></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"../upload/1332289195.jpg\" />\r\n			<p><strong>Content writing and marketing</strong>- Key word focused content is rapidly becoming obsolete. With the BERT update from Google, it focuses more on the searchers demand for which content they are looking for. Content which are keyword driven and focused will quickly loose organic traffic. In order to be visible on Google, companies need to focus on content on the intent of the searcher.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n			<p>At Innerworks there is a dedicated team of quality content writers to help you create 100 percent authentic contents for internal and external communications</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"../upload/2112960049.jpg\" />\r\n			<p style=\"text-align:justify;\">Next Gen SEO is HERE: Right now, a lot different changes are taking place in the search engines industry and updates are happening&nbsp; constantly. These changes have profoundly affected the user&rsquo;s search results. There has been a growth in the &ldquo;near me&rsquo;&rsquo; searches of around 900 per cent from 2013-2017.SEO plays a vital role in making your business visible on Google.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n			<p style=\"text-align:justify;\">Innerworks provide you with onside and offside SEO works to help you improve your visibility on search engines. It offers holistic SMO in order to strengthen your presence across social media platforms. Social presence and engagement play a crucial role in building your brand</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"../upload/1598803768.jpg\" />\r\n			<p style=\"text-align:justify;\"><strong>Livestream Video-</strong> In a survey, it was found that more than 75 per cent people will choose video over a blog. Livestream videos promotes real time interaction with customers and prospects in a cost effective way. The viewers don&rsquo;t need to imagine about your product or service instead they can see and feel it</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n			<p style=\"text-align:justify;\">For making a quality video for commercial purpose you need to have a video professional to take off from start to finish, hence in Innerwork the team of highly experienced video professionals will help you to make a good live stream video. There is a state of art studio team equipped with advance tool and software to produce and edit all types of videos and adding value to your livestream</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"../upload/2064595213.jpg\" />\r\n			<p style=\"text-align:justify;\"><strong>Social Commerce</strong> - Popular social media titans like Facebook, Instagram, Snapchat, WhatsApp make it easier to shop and buy products. On these apps business can make online stores, customised products, catalogues for the social stores and sell directly on these social media platforms. It&rsquo;s worth mentioning that this is still a relatively new and digital sales opportunity.</p>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n			<p style=\"text-align:justify;\">At Innerwork there is a separate team for managing these social commerce for any other companies. It is very beneficial for any STARTUPS to come into this business race and increase the sale of their products, services, and business. An expertized team is responsible to look after these works. Digital platforms for STARTUPS is very beneficial in order to boost up there business.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"left\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Facts to know</strong> :-</p>\r\n\r\n			<ul>\r\n				<li>\r\n				<p style=\"text-align:justify;\">Better content can drive traffic to a blog by up to 2,000%.</p>\r\n				</li>\r\n				<li><p style=\"text-align:justify;\">Search engines drive 93% of all website traffic.</p></li>\r\n				<li><p style=\"text-align:justify;\">Having a video thumbnail in the search results can<a href=\"https://www.brainshark.com/ideas-blog/2013/August/6-cool-stats-about-video-seo\" target=\"_blank\"> double your search traffic</strong></a>.</p></li>\r\n				<li><p style=\"text-align:justify;\">Video content is 50 times more likely to drive organic search results than plain text will.</p></li>\r\n				<li><p style=\"text-align:justify;\">content creation leads to 434% more indexed pages than websites without updated content. The key is to create as many pathways around the web for customers to find you.</p></li>\r\n				<li><p style=\"text-align:justify;\">38% of marketers are publishing content at least once a week.</p></li>\r\n				<li><p style=\"text-align:justify;\">81% of internet users agree that blog posts are trusted sources for information or advice.</p></li>\r\n				<li><p style=\"text-align:justify;\">To maximize their traffic, marketers should aim to post at least <a href=\"https://blog.hubspot.com/marketing/blogging-frequency-benchmarks?&amp;_ga=2.185165613.526310312.1517875276-1441859288.1444758731#sm.001o6d3zv162ceoascb2o9l50lh3z\" target=\"_blank\">16 blogs a month</a>. This strategy nets 3.5 times more response than posting less than 4 times a month.</p></li>\r\n				<li><p style=\"text-align:justify;\"><a href=\"https://marketingsherpa.com/article/case-study/customer-communication-by-channel\" target=\"_blank\">72% of consumers</a> state that email is their number one communication method when it comes to business transactions. This number remains constant even for the younger population.</p></li>\r\n				<li><p style=\"text-align:justify;\">Only 4% of email marketers use a layered targeting strategy.</p></li>\r\n				<li><p style=\"text-align:justify;\">25% of marketers do not outsource their content creation. 45% of content creation is done on an ad-hoc basis.</p></li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"right\" border=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"../upload/1468617703.png\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"right\" border=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"../upload/555377657.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<h2>Need of transparency to customers<img alt=\"\" src=\"../upload/362405718.png\" /></h2>\r\n\r\n			<p style=\"text-align:justify;\">RESEARCH indicates that companies producing transparent and easy-to-digest information are likely to retain 94% of their customers.<br />\r\n			However, how you handle a customer&rsquo;s private data is vital. In 2018, the GDPR policy was more actively enforced to ensure that companies handle customer data transparently.<br />\r\n			This means that there will be more emphasis on this in the future; companies will be required to be completely transparent on what kind of information is being shared to promote their products.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify;\">Here&rsquo;s a Tip on How to Improve Transparency <img alt=\"\" src=\"../upload/680957891.png\" /></p>\r\n\r\n			<ul>\r\n				<li><p style=\"text-align:justify;\">Establish your company&rsquo;s core values.</p></li>\r\n				<li><p style=\"text-align:justify;\">Make sure that selling is not your only goal.</p></li>\r\n				<li><p style=\"text-align:justify;\">Be an open book to your customers- tell them as much as you can about who they are doing business with.</p></li>\r\n				<li><p style=\"text-align:justify;\">If customers raise some concerns or questions, respond immediately.</p></li>\r\n				<li><p style=\"text-align:justify;\">Be able to take constructive criticism from your customers and respond in a friendly, non-judgmental tone.</p></li>\r\n				<li><p style=\"text-align:justify;\">Create space and encourage people to give different suggestions to help improve your products- facilitate a community around your brand.</p></li>\r\n			</ul>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n			<p style=\"text-align:justify;\">AT innerwork the team keeps focus and checking that what the customer demands in this era and help you to get the best out of it in terms of value. Innerwork helps you to get a good relation with the customers and help you get a good business out of it. Inner works adds up this value to your company in making the business</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"../upload/1439456433.png\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '158888279615887660947_150.jpg', '1', '2020-05-09', '2020-07-01 09:25:32'),
(12, '<font face = \"Monotype Corsiva\" size = \"4\"> \nInnerworkindia | Digital Marketing Services | 3D Animation | Photography</font>', '<p style=\"text-align:justify;\">https://www.youtube.com/embed/mV6DBFPRpVc</p>\r\n', 'logo.png', '1', '2020-05-09', '2020-07-01 07:36:23'),
(13, '<font face = \"Monotype Corsiva\" size = \"4\">   Brand 12 Archetypes</font>', '<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>&nbsp;</strong></p>\r\n\r\n<h1><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Brand 12 Archetypes</strong></h1>\r\n\r\n<p style=\"text-align:justify;\">Archetype is a work taken from Greek language widely used by Carl Gustav Jung, which means &ldquo;typos&rdquo;. Out of several archetypes jung has taken only 12 typos. The model of 12 archetypes is helps to do Branding for your company. From designing, brand purpose, brand strategies, logo, messaging and the things connected with Branding.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\"><img alt=\"\" src=\"https://myfiles.space/user_files/52042_9841b8d352284ef2/1589033844_marketing-theory-charu/1589033844_marketing-theory-charu.001.png\" width=\"514\" /></p>\r\n\r\n<p style=\"text-align:justify;\">Many famous brands such as Nike and Apple have used Branding strategies and theory for their brand to be place at where it is nowadays. Let&rsquo;s highlight on these 12 types one by one.</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>Creator:</strong>&nbsp;This archetype helps people to create vision for the brand such as a message which shows the culture of the brand. The Brand message is a way of communicating the idea of innovation.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>Ruler:&nbsp;</strong>It relates to<strong>&nbsp;</strong>the leadership, helps to create a family and community. This is very important for your company to create such environment amongst your associates.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\">&nbsp;Examples- Mercedez Benz&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:04100CB7-6E6E-4246-8327-C53D06B60918\" width=\"623\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>Caregiver:</strong>&nbsp;It seeks to help people by applying their strategies. Protect your customers from any harm and nurturing which creates caring atmosphere. For example: Volvo logo is itself a symbol of safety.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>Innocent</strong><strong>:&nbsp;</strong>It shows the idea of keeping trust for your customers, goodness and with positive strategies to apply. Like a child with all simplicity, trusting and cleansing environment to be developing. Example:</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:691A57BE-E752-4DFF-863E-A33D0F3B79CD\" width=\"623\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>Sage:&nbsp;</strong>This encourages the innovative thinkers and keeping desire of finding the truth. Their customers&rsquo; needs to discover the truth, seeking out for knowledge and information, for selfreflective.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>Explorer:&nbsp;</strong>The reason of the brand prime example is to encounter a more true, more satisfying life. Their clients ought to discover out themselves, through investigating the world. The procedure of the brand original is looking for out and encountering unused things, getting away from entanglement and boredom.</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>Outlaw:</strong>&nbsp;This relates to removing the flaws from your workplace which resist the workflow. Destroying the things that are not working and to try something else.</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>Magician</strong><strong>:</strong>&nbsp;The magician is the one who makes dreams come true for the brand. Creating the magical moments by fulfilling the company&rsquo;s dreams and visions.</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>Hero:</strong>&nbsp;The Hero when person become very strong, powerful and competent, become master in order improve the Brand.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>Everyone:&nbsp;</strong>The customers of the brand always open to connect with each other and emphasizing the people&rsquo;s loneliness. The strategy of the Everyman archetype is to develop solid virtues, the common touch.</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>Jester:</strong>&nbsp;Employees having fun, enjoying the work environment, spreading the happiness in their work and having desire of enjoying the work moments.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>Lover:</strong>&nbsp;Falling in love with idea of people and environment. Chanel is a brand that puts the first beauty of a woman. And in reality, the woman is perfection and beauty. The love and commitment come from them and Chanel emphasizes every little attribute of women&rsquo;s beauty.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\">&nbsp;Charu &ndash; Digital Marketing Execuitve&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\">&nbsp;InnerWork Solutions Pvt ltd</p>\r\n', '1589966501Capture2.PNG', '1', '2020-05-09', '2020-07-01 07:38:40'),
(16, '<font face = \"Monotype Corsiva\" size = \"4\"> Website Development</font>', '<h1><u><strong>WEBSITE DEVELOPMENT</strong></u></h1>\r\n\r\n\r\n<div><p style=\"text-align:justify;\">We have a dedicated team for Website Development, which helps in providing a solution for all of your doubts. Creating a website is not an easy task. As rightly said, the more you create, the more you will learn. Working in website development involves learning new programming languages along with marketing, gathering requirements of the clients, and human-computer interaction. It is an immense growing field in today&rsquo;s world. It is often used by business people to advertise their company, hire people, and give immense services to clients. The websites are often used for communication, engaging the public in our company. Our team has web developers, which are highly equipped with advanced technical knowledge and making interactive websites for all types of business-related activities. Just let us know about your business idea and the assigned team will help you in mentoring it digitally in the quickest way possible.</p></div>\r\n', 'logo.png', '1', '2020-06-08', '2020-07-01 07:39:03'),
(17, '<font face = \"Monotype Corsiva\" size = \"4\"> Digital \r\nMarketing</font>', '<h1><u>DIGITAL MARKETING </u></h1>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:https://innerworkindia.com/4960a5f9-336a-4443-87e8-621c029148c7\" width=\"404\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p style=\"text-align:justify;\">We offer you smart and innovative digital marketing solutions from our digital marketing team, which has vast digital experience. They help and mentor you and strengthen the brand reputation since the audience is the most important part to help in growing the brand. Digital Marketing has become prevalent among them as people use more digital services nowadays in our everyday life. It helps to create awareness among the audience.</p>\r\n\r\n<p style=\"text-align:justify;\">1) SEO, SMO, and PPC</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:https://innerworkindia.com/3c212aeb-2084-4f46-a0d4-89bbad849df1\" width=\"438\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p style=\"text-align:justify;\">We have onsite and offsite Search Engine Optimisation (SEO) work and efficient and dedicated team members for the same. It makes the work of clients easier to find the company when they want the relevant information. Social Media Optimization (SMO) solutions are also offered to help you strengthen across various fields and different social media platforms. The team also helps in Pay Per Click (PPC) once you click on any of the advertisements for the betterment of the company.</p>\r\n\r\n<p style=\"text-align:justify;\">2) Content Writing and Marketing</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:https://innerworkindia.com/2d609cf3-bdef-4107-86ca-70220ce0d88c\" width=\"419\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p style=\"text-align:justify;\">We have a dedicated team of content writers, which communicate efficiently across various social media platforms and help in creating different types of content for various purposes. As rightly said, content is anything that adds value to the reader&rsquo;s life. By giving us your content requirement, we can produce you the most efficient solution with full authentication. We also do content marketing, which helps in long-lasting relationships with our audience and helps to build our authority and brand recognition.</p>\r\n\r\n<p style=\"text-align:justify;\">3) Video Creation and Marketing</p>\r\n\r\n<p style=\"text-align:justify;\">- Commercial Videos and AD Film</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:https://innerworkindia.com/55a0f862-71bc-4a95-890b-c395861b62e0\" width=\"221\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p style=\"text-align:justify;\">We have a team of video creation of trusted professionals to solve all your problems and to help you in developing an efficient video of your use. The team will solve all your worries right from scratch. Also, there are several quality films for our clients in an efficient way to help then in the market.</p>\r\n\r\n<p style=\"text-align:justify;\">- Video Editing</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:https://innerworkindia.com/44f121d8-9aea-44ce-80eb-44419e5975ba\" width=\"243\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p style=\"text-align:justify;\">The Video Editing team is well trained in their software&rsquo;s and the studio is well equipped with the latest technology and the software for editing all types of videos to make it more presentable and appealing.</p>\r\n\r\n<p style=\"text-align:justify;\">- 3D Animated Video</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:https://innerworkindia.com/fb63fd02-2230-41db-bc7d-7733777e2fed\" width=\"330\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p style=\"text-align:justify;\">The team helps you in creating wonderful animations to bring and manipulate real-life objects. Just share your idea and they will help you in creating a marvelous masterpiece!</p>\r\n\r\n<p style=\"text-align:justify;\">- Photography</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:https://innerworkindia.com/af126580-4d3a-4399-be88-ce8c37446d39\" width=\"295\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p style=\"text-align:justify;\">As rightly said, photography is a story that is failed to put it into word. The team expresses all the efficient work through this brilliant skill as we have a pool of photographers to capture mind-blowing images, who are professionally trained in their field.</p>\r\n', 'logo.png', '1', '2020-06-11', '2020-07-01 07:40:28'),
(19, '<font face = \"Monotype Corsiva\" size = \"4\"> Test</font>', '<p style=\"text-align:justify;\">Test</p>\r\n', 'logo.png', '1', '2020-06-12', '2020-07-01 07:40:46'),
(20, '  <font face = \"Monotype Corsiva\" size = \"4\">                                                   Digital Marketing</font>', '<p style=\"text-align:justify;\"><strong>&nbsp;What is Digital Marketing?</strong><br />\r\nWant to target large scale audience? Want to extend your reach to better platforms, so you can reach maximum number of people and convey your messages? Well, we have a solution to that too. DIGITAL MARKETING is the key. Digital marketing is that the component of selling that utilizes Internet and online based digital technologies like as computers, mobile phones and other digital media and platforms to market products and services. In simple words, any form of marketing and promotion of products or services that involves electronic devices is Digital marketing. Channel such as social media, mobile applications, search engines, web applications, email, websites are all modes of Digital Marketing.</p>\r\n\r\n<p style=\"text-align:justify;\">Why is Digital Marketing Important &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\nNow, when you invest your precious time and hard-earned money into your campaigns, you want to know that they are working. The importance of digital marketing similarly is that you can easily track and monitor your campaigns. Digital marketing makes it easy for you to adapt and drive better results.</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>How does Digital Marketing Work&nbsp;</strong><br />\r\nDigital Marketing uses the following components<br />\r\n<strong>ïƒ˜&nbsp;&nbsp; &nbsp;SEO- SEARCH ENGINE OPTIMIZATION</strong></p>\r\n\r\n<p style=\"text-align:justify;\">&bull;&nbsp;&nbsp; &nbsp;What is SEO?<br />\r\nWell, SEO is the process of making a web page easy to find and categorize. SEO is an important part of any digital marketing strategy. If you are wondering about how SEO and Digital marketing work hand in hand, let me help you.</p>\r\n\r\n<p style=\"text-align:justify;\">&bull;&nbsp;&nbsp; &nbsp;Why is SEO important for your products and services?<br />\r\nSEO is very significant in Digital Marketing as it makes your website more visible which means more traffic and better opportunities to gather your prospects into customers. Besides, it is also a valuable tool for brand awareness, building relationships with clients and positioning yourself as a trustworthy expert in your field. &nbsp;It is basically the process of growing the quality and quantity of website traffic by increasing the visibility of a website or page to users of a web searching engine. It is very important for to keep in mind some very basic point while using SEO for their Website, like Mastering keyword search, Understanding your competition, Planning your site, Optimizing your site, Producing regular content, Building your social network, Understanding Google Analytics.</p>\r\n\r\n<p style=\"text-align:justify;\">&bull;&nbsp;&nbsp; &nbsp;How does SEO work?<br />\r\nSo, once you have understood what exactly is SEO and its importance, you move further to know how it works. Even if you do not have any prior experience in SEO-associate, you can still work and make some positive changes that will improve your search engine optimization. Yet, To let you know, in simple words, SEO is just a search engine that makes changes to your web design and content that makes your site more attractive to a search engine and people are compelled to visit your site once it is displayed on the search engine.<br />\r\n<strong>ïƒ˜&nbsp;&nbsp; &nbsp;SMO- SOACIAL MEDIA OPTIMIZATION&nbsp; &nbsp;&nbsp;</strong><br />\r\nIts 21st Century and nearly 70% of the world&rsquo;s population uses Internet effectively and is active on one or the other social media platforms. Social media is one of the easiest ways to gather attention and promote your products and services to large scale audience. SMO plays an important role in increasing traffic via social media. SMO is the use of number of outlets and communities to generate publicity to increase the awareness of a product, service, brand or an event.</p>\r\n\r\n<p style=\"text-align:justify;\">&bull;&nbsp;&nbsp; &nbsp;Importance of SMO-<br />\r\nWith SMO you can ensure a strong web presence for your products and services. It not only introduces people to the business but also helps in branding, improving and recall. SMO provides you the opportunity to reach out to the niche audience. Social media has mastered the art of promotions and it is capable of leaving a long-lasting impact on large scale audience with it&rsquo;s power. Social media has gathered users from all over the world, irrespective of age, from young to old, students to working and everyone. It has connected everyone by a chain that is connected via Internet. Social Media Optimization uses this power of social media to display the content that it wants to promote to large scale audience. It is totally in our hands as to how we utilize this bane given to us to increase the traffic on our websites and increase our popularity in the industry.<br />\r\n&ldquo;WE ARE DIGITAL, WE HAVE THE POWER TO GO VIRAL. WE MAKE EFFICIENCY COUNT AND CREATIVITY MATTER&rdquo;<br />\r\n&nbsp;&nbsp;<br />\r\n<strong>ïƒ˜&nbsp;&nbsp; &nbsp;PPC-PAY PER CLICK&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong><br />\r\nEvery wondered your one click on the Internet could make someone earn money or you could earn money when someone clicks an ad published by you. Yes, PPC is the master behind money for click. Pay-per-click is an internet advertising model used to drive traffic to websites, in which an advertiser pays a publisher when the ad is clicked.&nbsp;<br />\r\n&bull;&nbsp;&nbsp; &nbsp;How does PPC Work?&nbsp;<br />\r\nPPC, in other words is an attempt to buy visits to your site inorganically. This component provides you with opportunities to advertise an earn for each click that a prospect makes for visiting your site. Sounds interesting, right? Well, it is equally interesting and beneficial too. There is no rocket science behind working of PPC, rather it is as simple as a click. You publish an add, you promote it on the web via digital marketing, now that ad has the potential to reach out to people on the internet. Once that ad is displayed to an online user, and the ad is clicked, you get paid for it. Simple, it is. Right?<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Why is PPC important?<br />\r\nPPC is growing at a fast rate in this even faster growing world. Advertisers love PPC advertising because it allows them to make the key changes in the optimization strategies to improve the quality of their website and increase traffic and also them getting equally paid for the hard work as this, in return increases the ROI for your PPC campaigns. PPC is one the most profitable marketing strategies when it comes to generating higher ROI and visits.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '1592308101dm5.jpg', '1', '2020-06-16', '2020-07-01 07:41:59'),
(21, '<font face = \"Monotype Corsiva\" size = \"4\"> Content Writing and Marketing </font>', '<p style=\"text-align:justify;\">&nbsp; &nbsp; &ldquo;GOOD FIRST IMPRESSIONS ARE GOOD FOR BUSINESS&rdquo;<br />\r\nAgree or not? Your first impression always has a great impact over what is going to be future impression of yours in the minds of your clients or peers. No matter how good your product or services are, or how brilliant you are at your work or in your field, but if you are unable to present it and able to engage the audience or prospects, it is worthless. Therefore, to make out full advantage out of your skills, it is very important that you present them beautifully and are able to gain people&rsquo;s attention and engagement.<br />\r\nWondering how to create a good first impression, or how to present your skills and work beautifully without actually performing it? Well, what is the first thing you look at, or that attracts you when you first visit any website or webpage? Yes, you are there! It&rsquo;s the content. The content of that page is the first thing that go through, and the engagement of the content decides weather you will stay on the page or you will swipe through.<br />\r\n<strong>Importance of Content Writing</strong><br />\r\nThat, my friend is the importance and power of the Content in any work that you are doing. A good and attractive content always gathers more attention and audience in comparison to a rough, inappropriate, stretched and lame writing. A good content is always welcome and read by people, a good content is that keeps the reader engaged and marks the expectations of a reader. So, it is very important for us to maintain our first impressions and our way of presentation that is the content we display needs to be engaging, interesting, creative, plagiarism free, satisfactory, informative and relevant.<br />\r\n<strong>Work with a Brilliant Team</strong><br />\r\nOur professional and experienced team of Creative content writers is here to help you with 100% authentic content matching your requirements. We have a brilliant team of talented individuals who look after all the aspects of Creating Engaging content keeping in mind that the content is creative, engaging, plagiarism free, relevant, to the point and worth a read. The language be simple or high profile, our team looks after it all. The content never lets you down.&nbsp;<br />\r\nContent writing and marketing work hand in hand for promotion your products and services. A good content is the key for good marketing. Once you have a valuable content it becomes equally easy for you to promote it in the market. Good content gives you advantage over other, as you are able to present and explain yourself in a far better way compared to others and marketize in a better way.</p>\r\n\r\n<p>&nbsp;<br />\r\n&nbsp;</p>\r\n', '1592818720cnm2.png', '1', '2020-06-22', '2020-07-01 07:42:34'),
(22, '<font face = \"Monotype Corsiva\" size = \"4\"> Recruitment</font>', '<h1>&nbsp;&nbsp;&nbsp;&nbsp;</h1>\r\n\r\n<p style=\"text-align:justify;\"><strong>RECRUITMENT</strong></p>\r\n\r\n<p style=\"text-align:justify;\">&nbsp;<strong>O</strong>ne of the important aspects and needs of the company is its staff and the workforce without a proper team of people with good skills and talent a company can&rsquo;t get through in this competitive world. So to pull out the best for the company we are having a great talent acquisition team and strategies for performing the pool according to the need and requirements for your company more efficiently and strongly without any undertones or any backlogs. Recruitment is all that is highly needed for making a company increase its employees as well as its strength. According to the company the sole power and development depends merely on the manpower and the thinking of the board of members in a company or business. So to push up in an ever-changing environment along with the thinking the manpower also must be empowered to make the business get away from extinction.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>Innerwork Solution&#39;s </strong>main objective is to provide more reliable proficient support to our clients in all means to make them feel satisfied with our work and in this process the recruitment section of the company consists of a very well trained people who can bring the best out of the best in the posts and work you want the people for, this makes more simple to your company for gaining more proficient staff in the work and things you do. Being an expert panel, the members of Innerwork Solutions are forward in every scenario of recruitment in selecting the best and talented people in the heap of applications.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>O</strong>ur online software is perfect in sorting the applicants according to their resumes to filter them beforehand coming to the recruitment process. Our skilled recruiters comprehend talent acquisition,on-boarding, and withholding challenges and therefore offer full-service conventional solutions to determine all staffing requirements, talent management, payroll outsourcing, and talent development needs.</p>\r\n\r\n<p style=\"text-align:justify;\"><strong>T</strong>he Innerwork Solutions&rsquo; portrait <u>goal</u><em><u>&nbsp; </u></em>is to generate a talent pool in such a way that the requirement of your company will be fulfilled with more ease and self-esteemed manner. all you got to do is to raise the need and requirements of your company and such that we will make a clear talent pool as per your requirements cleanly and clearly without any further involvement of your company. So if you are thinking about a better option for the recruitment of your company then The Innerwork Solutions would be a very good option such that the whole process of recruitment will be safe and secure.The recruitment service is one of the unique ones in the HR services provided by our company. As with this service, many companies got filled with a proficient and talented staff in their companies. All you got to do is to provide us your requirement and the needs of your company in the working staff and the rest of the recruitment process will be in our safe hands.Inner work solutions also provides a free Quota for their clients in this service with particular terms and conditions.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '1592921196index.jpg', '1', '2020-06-23', '2020-07-01 07:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `collegeportal`
--

CREATE TABLE `collegeportal` (
  `college_info_id` int(11) NOT NULL,
  `collegename` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `looking` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `numofstudent` varchar(50) NOT NULL,
  `writeuscollege` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer`
--

CREATE TABLE `freelancer` (
  `userid` int(5) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `mobile` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `contactperson` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `noofstaffs` int(20) NOT NULL,
  `noofoffices` int(20) NOT NULL,
  `noofplacements` int(20) NOT NULL,
  `privacy` text NOT NULL,
  `terms` text NOT NULL,
  `comment` varchar(100) NOT NULL,
  `sector` varchar(100) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`userid`, `companyname`, `website`, `mobile`, `address`, `state`, `city`, `postcode`, `contactperson`, `email`, `password`, `noofstaffs`, `noofoffices`, `noofplacements`, `privacy`, `terms`, `comment`, `sector`, `experience`, `keyword`, `image`, `status`) VALUES
(3, 'innerworkindia.com', 'lll', '8475961254', 'bangolore', 'Chhattisgarh', ' Baikunthpur ', '416210', 'Bela', 'pratiksha@gmail.com', '2222', 85, 55, 125, '0', '0', '', '', '', '', '', 0),
(5, 'innerworkindia.com', ' tttt', '8475961254', ' bangolore', ' Chhattisgarh', '  Baikunthpur ', ' 41621', ' ggg', 'pratiksha1029@gmail.com', '1029', 2, 23, 51, '0', '0', '', 'Agriculture, Fishing, Forestry', '12', ' IT', '', 1),
(7, '', ' ', '9887888469', ' Kangari', ' Karnataka', '  Bangalore Rural ', ' 56006', ' ', 'navneetrj1@gmail.com', 'Ranu@123', 0, 0, 12, 'on', 'on', 'Iggsjwns', 'Aerospace', '1', 'It and non it', 'Banner.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE `internship` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `city` varchar(100) NOT NULL,
  `education` text NOT NULL,
  `mobno` varchar(15) NOT NULL,
  `exp` varchar(100) NOT NULL,
  `skill` text NOT NULL,
  `interest` varchar(1000) NOT NULL,
  `fnamee` varchar(2000) DEFAULT NULL,
  `jobpost_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`id`, `name`, `email`, `gender`, `city`, `education`, `mobno`, `exp`, `skill`, `interest`, `fnamee`, `jobpost_id`) VALUES
(1, 'abc', 'abc@gmail.com', 'Female', 'Bangalore', 'ABC', '2147483647', '0-1 year', 'bbusbciusncs', 'dfghjk', 'false', NULL),
(2, 'Anil kumar Chaurasia', 'akc.nke@gmail.com', 'Male', 'Bangalore', 'MBA', '2147483647', '3-4 years', 'Marketing', 'Business development', '1590146511_Screenshot_2020-05-22-16-49-25-21.jpg', NULL),
(7, 'Suma', 'vshxv@gmail.com', 'Female', 'xnvhjk', 'bnm,', '2147483647', '0-1 year', 'cvbnmk', 'kkjhg', '', NULL),
(9, 'sony', 'abc@gmail.com', 'Female', 'cvbn', 'bnm,', '2147483647', '3-4 years', 'fghu', 'fghui', 'abc@gmail.com', NULL),
(10, 'Naveen', 'naveengn06@gmail.com', 'Male', 'bfsakjbf', 'dsdf', '2147483647', '0-1 year', 'DSFSDF', 's', 'naveengn06@gmail.com', NULL),
(11, 'Naveen', 'naveengn06@gmail.com', 'Male', 'bfsakjbf', 'dsdf', '2147483647', '0-1 year', 'DSFSDF', 'sdsds', 'naveengn06@gmail.com', NULL),
(13, 'Naveen', 'naveengn06@gmail.com', 'Male', 'bfsakjbf', 'dsdf', '2147483647', '0-1 year', 'DSFSDF', 'sdsds', 'naveengn06@gmail.com', NULL),
(15, 'BASAVARAJU B', 'bondbasavaraju319@gmail.com', 'Male', 'Bangalore', 'Bsc computer science', '2147483647', '0-1 year', 'Python java', 'Development field  as a software feveloper', 'bondbasavaraju319@gmail.com', NULL),
(16, 'dfg', 'dfg@gmail.com', 'Male', 'sr', 'dfgh', '2147483647', '1-2 years', 'rtyu', 'hi', 'dfg@gmail.com', NULL),
(17, 'dfg', 'dfg@gmail.com', 'Male', 'sr', 'dfgh', '2147483647', '1-2 years', 'rtyu', 'hi', 'dfg@gmail.com', NULL),
(18, 'dfg', 'dfg@gmail.com', 'Male', 'sr', 'dfgh', '2147483647', '1-2 years', 'rtyu', 'hi', '1', NULL),
(19, 'dfg', 'dfg@gmail.com', 'Male', 'sr', 'dfgh', '2147483647', '1-2 years', 'rtyu', 'hi', '1', NULL),
(20, 'dfg', 'dfg@gmail.com', 'Male', 'sr', 'dfgh', '2147483647', '1-2 years', 'rtyu', 'hi', '1', NULL),
(21, 'dfg', 'dfg@gmail.com', 'Male', 'sr', 'dfgh', '2147483647', '1-2 years', 'rtyu', 'hi', '/tmp/phpotL8A6', NULL),
(22, 'dfg', 'dfg@gmail.com', 'Male', 'sr', 'dfgh', '2147483647', '1-2 years', 'rtyu', 'hi', 'Akasha Deepavu Neene.docx', NULL),
(23, 'dfg', 'dfg@gmail.com', 'Male', 'sr', 'dfgh', '2147483647', '1-2 years', 'rtyu', 'hi', 'Akasha Deepavu Neene.docx', NULL),
(24, 'Sumana', 'sumansumanr99@gmail.com', 'Female', 'ASC', 'BCA', '2147483647', '1-2 years', ',', 'IT Computer Science', 'BIRUGALI Hoovina banadante.docx', NULL),
(25, 'suman', 'ghjhghjg@jhjjkk.com', 'Female', 'hbhbjn', 'ghgjh', '2147483647', '3 months', 'java', 'softwatre', '', NULL),
(26, 'Anoona Parveen', 'parveenanoona@gmail.com', 'Female', 'Indraprastha College for Women', 'Student', '2147483647', '2 months', 'Content writing, language proficiency in English; Hindi and Malayalam, Already done with 3 internships.', 'Psychology, data entry and content writing', '', NULL),
(27, 'Ritika Gurnani', 'ritikagurnani0@gmail.com', 'Female', 'Lachoo memorial college', '2nd year', '2147483647', '2 months', 'English proefficiency, ms word, PowerPoint, excel, english speaking', 'content writing, motivating and handling people', '', NULL),
(28, 'Neha gupta ', 'nehaguptag143@gmail.com', 'Female', 'Lachoo memorial college ', 'Pursuing BBA', '2147483647', '2 months', 'Good communication skills and ability to manage work', 'Reading books and learning new things.', '', NULL),
(29, 'JHARNA GOVINDANI', 'govindanijharna@gmail.com', 'Female', 'Lachoo Memorial College of science & technology', ' Persuing BBA 2 YEAR ', '2147483647', '45 days', 'Active listening, Communication , Interpersonal skills,etc.', 'Playing Batminton & exploring &learning about new things.', '', NULL),
(30, 'Nandini  Sotwal', 'nandinisotwal821@gmail.com', 'Female', 'Lachoo Memorial College ', 'Pursuing BBA', '2147483647', '2 months', ' Good communication skills , Teamwork . ', 'Reading , like to participate in new activities , learning new things.', '', NULL),
(31, 'Priyanshi Pitti', 'priyanshipitti19@gmail.com', 'Female', 'Symbiosis University of applied sciences indore', 'BBA inRetail management', '2147483647', '45 days', 'Listening, trustworthy, good at Ms excel', 'Data entry', '', NULL),
(32, 'Ajay Kumar Singh', 'ajvj202@gmail.com', 'Male', 'IES College of technology', 'B.Tech (CS)', '2147483647', '3 months', 'Core Java, Python ( beginner)', 'Software development (enterprise)', 'Resume.pdf', NULL),
(33, 'Mayuresh Shivapurkar', 'shivapurkarmayuresh@gmail.com', 'Male', 'SSPM\'s College Of Engineering ', 'B.tech (3rd year) Mechanical Engineering', '2147483647', '2 months', 'Languages ,Skilled Mechanics, Diploma In Mechanical, CAD , Solidworks, Cattia', 'petroleum engineering , operations , production and other many', '', NULL),
(34, 'Priyanshi Pitti', 'priyanshipitti19@gmail.com', 'Female', 'Symbiosis University of applied sciences indore', 'BBA inRetail management', '2147483647', '45 days', 'Listening, trustworthy, good at Ms excel', 'Data entry', '', NULL),
(35, 'Vidushi kohli', 'vidushi.kohli12@gmail.com', 'Female', 'Lachoo memorial college', 'Pursuing B.B.A 2nd  YEAR', '2147483647', '3 months', 'Good at communicating and good at MS EXCEL And MS WORD', 'Dancing, reading books', 'my RESUME.docx', NULL),
(36, 'Anwesha Dey', 'anwesha.dey1998@gmail.com', 'Female', 'B. P. Poddar Institute of Management and Technology', 'Btech(under grad)', '2147483647', '2 months', 'Java, python,c, dbms(sql), data structure', 'Java Development', '1590844416369_RESUME ANWESHA 1.pdf', NULL),
(37, 'Priyanshi Pitti', 'priyanshipitti19@gmail.com', 'Female', 'Symbiosis University of applied sciences indore', 'BBA inRetail management', '2147483647', '3 months', 'Listening, trustworthy, good at Ms excel', 'Learning new skills', '', NULL),
(38, 'Alka Rani', 'alkarajput821@gmail.com', 'Female', 'Lovely Professional University,Phagwara,Punjab.', 'B.Design Multimedia', '2147483647', '2 months', '3d Rigging', 'Character Rigging', 'Alka_Rani_Resume.PDF', NULL),
(39, 'shubham raj laxmi', 'shubhamrajlaxmi282@gmail.com', 'Female', 'dehradun', 'prefinal year of btech', '2147483647', '2 months', 'c++, c, c#, python, web development, word, exel, spreedsheets, content writing, management skills', 'wen development ,  content writing, python, managemnt', 'shubham raj laxmi resume final.pdf', NULL),
(40, 'Pallavi. S', 'pallavipriya619@gmail.com', 'Female', 'Maharani college Bangalore', 'MBA', '2147483647', '1 month', 'Ms exel, word, power point', 'HR', 'pallavi resume  (1).pdf', NULL),
(41, 'Reema C', 'reemz3009@gmail.com', 'Female', 'M.S Ramaiah  institute of management', 'MBA', '2147483647', '1 month', 'recruiter , good at typing, english spoken ', 'Human resource', '', NULL),
(42, 'Shreya Ramtirth', 'shreyaramtirth4@gmail.com', 'Female', 'KHS', 'Graduation', '2147483647', '45 days', 'Python,c,c++ etc', 'Programming', '', NULL),
(43, 'Divyansh Sharma', 'divyanshsharma361@gmail.com', 'Male', 'Jodhpur', 'bTech', '2147483647', '1 month', 'python, ml, digital marketing', 'ds and ml', '', NULL),
(44, 'Navneet raj', 'navneetrj1@gmail.com', 'Male', 'Arya college ', 'B.tech', '2147483647', '45 days', 'Php', 'Php', '', NULL),
(45, 'Kuldeep Bishnoi', 'kuldeep.bishnoi711@gmail.com', 'Male', 'Lachoo Memorial College', 'Pursuing BBA ', '2147483647', '1 month', 'Good communication and Interaction Skills. Good convincing and people dealing, counseling skills Good leadership quality. Also Have good computer operating skills. Can work in excel and all other office tools.', 'Have keen interest in learning new things. Love to play outdoor sports like TT and Badminton.', 'KD resume.pdf', NULL),
(46, 'soundarya', 'soundaryakarli@gmail.com', 'Female', 'pvpp', 'be', '2147483647', '3 months', '', '', NULL, NULL),
(47, 'soundarya', 'soundaryakarli@gmail.com', 'Female', 'mum', 'be', '2147483647', '0-1 year', ',Android Developer', ',Channel Manager', '', 52),
(48, 'ranu', 'navneetrj1@gmail.com', 'Male', 'Barama', 'BCA 1st Year', '9887888469', '2 months', 'Php developer', 'Digital Media Manager', NULL, NULL),
(49, 'Rakesh S', 'rakesh123410101999@gmail.com', 'Male', 'Bangalore', 'BE/B.Tech 3rd year', '9606502760', '2 months', 'python3 numpy', 'Web developer and ML and DL on AI implement', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobpost`
--

CREATE TABLE `jobpost` (
  `id` int(11) NOT NULL,
  `jobTitle` varchar(30) NOT NULL,
  `company` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jobType` varchar(30) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `minSalary` double DEFAULT NULL,
  `maxSalary` varchar(50) DEFAULT NULL,
  `cpname` varchar(20) NOT NULL,
  `cpnum` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `exp` varchar(12) NOT NULL,
  `education` varchar(1000) NOT NULL,
  `j_desc` text NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `job_referalamt` varchar(255) DEFAULT NULL,
  `about_comp` longtext DEFAULT NULL,
  `type` text NOT NULL,
  `skills` text DEFAULT NULL,
  `idesc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobpost`
--

INSERT INTO `jobpost` (`id`, `jobTitle`, `company`, `email`, `jobType`, `location`, `minSalary`, `maxSalary`, `cpname`, `cpnum`, `status`, `exp`, `education`, `j_desc`, `dateTime`, `job_referalamt`, `about_comp`, `type`, `skills`, `idesc`) VALUES
(1, 'Digital Marketing', 'Innerwork Solutions ', 'internship@innerworkindia.com', NULL, NULL, NULL, 'Unpaid', 'Sheela Jha', '9487980784', 1, '45 days', 'MBA Fresher', 'Innerwork provides full-range human resources and IT solutions to help businesses improve hiring and digital infrastructure for the effective functioning of the company. Founded with a purpose to find the right balance of quality hiring and smooth on-boar', '2020-06-30 10:50:19', NULL, NULL, 'Internship', NULL, NULL),
(23, 'Business Development Manager', 'Innerwork Solutions ', 'anil.chaurasia@innerworkindia.', 'Fresher', 'Bangalore', 100000, '300000', 'Anil Chaurasia', '9487980784', 0, '3-4 years', 'Graduate', 'Candidate should be excellent in communication and have technical knowledge about IT.', '2020-06-29 05:45:55', '8000', '', 'Job', NULL, NULL),
(45, 'Business development Executive', 'Innerwork Solutions ', 'anil.chaurasia@innerworkindia.', 'Experience', 'Bangalore, Delhi, Hyderabad', 15000, '35000', 'Anil Chaurasia', '9487980784', 1, '1-2 years', 'Any Graduate and above', 'Generating new business opportunities through our various communication platforms (marketing cross channel communication platform and AI driven products)\r\nDevelop sales pitch strategies that optimize the market potential\r\nUnderstanding customers\' diverse,', '2020-06-25 11:50:08', NULL, '', 'Job', NULL, NULL),
(53, 'Marketing and business', 'Innerwork Solutions ', 'anil.chaurasia@innerworkindia.', NULL, NULL, NULL, 'Unpaid', 'Anil Chaurasia', '9487980784', 1, '45 days', 'MBA Fresher', 'Innerwork provides full-range human resources and IT solutions to help businesses improve hiring and digital infrastructure for the effective functioning of the company. Founded with a purpose to find the right balance of quality hiring and smooth on-boar', '2020-06-30 11:50:09', NULL, NULL, 'Internship', NULL, NULL),
(54, 'Digital Marketing', 'Innerwork Solutions ', 'internship@innerworkindia.com', NULL, NULL, NULL, 'Unpaid', 'Sheela Jha', '9487980784', 1, '45 days', 'MBA Fresher', 'Innerwork provides full-range human resources and IT solutions to help businesses improve hiring and digital infrastructure for the effective functioning of the company. Founded with a purpose to find the right balance of quality hiring and smooth on-boar', '2020-06-30 11:50:19', NULL, NULL, 'Internship', NULL, NULL),
(55, 'Digital Marketing Manager', 'Innerwork Solutions ', 'anil.chaurasia@innerworkindia.', 'Experience', 'Bangalore, Delhi, Hyderabad, M', 15000, '35000', 'ANil Chaurasia', '9487980784', 1, '2-3 years', 'BE/BTech', 'Plan and execute all digital marketing, including SEO/SEM, marketing database, email, social media and display advertising campaigns\r\nDesign, build and maintain our social media presence\r\nMeasure and report performance of all digital marketing campaigns, ', '2020-06-25 11:50:02', NULL, 'Innerwork provides full-range human resources and IT solutions to help businesses improve hiring and digital infrastructure for the effective functioning of the company. Founded with a purpose to find the right balance of quality hiring and smooth on-boarding, Innerwork believes in understanding the business inside-out and be a strategic partner in the business journey.', 'Job', NULL, NULL),
(56, 'laravel developer', 'innerwork', 'mishrasudhanshu0786@gmail.com', 'Experience', 'lucknow', 15000, '25000', 'sudhanshu mishra', '9685265987', 1, '0-1 year', 'MCA', 'test', '2020-06-25 11:49:46', NULL, 'test', 'Job', NULL, NULL),
(57, 'testing', 'test successful', 'mishrasudhanshu0786@gmail.com', NULL, NULL, NULL, 'Unpaid', 'sudhanshu mishra', '9658282922', 1, '6 months', 'MCA 3rd Year', ' i  dont knoq', '2020-06-30 11:50:28', NULL, NULL, 'Internship', NULL, NULL),
(58, 'abc', 'xyz', 'xyz@gmail.com', NULL, NULL, NULL, '10000', 'soundarya', '9970016477', 1, '45 days', 'B.Com 1st Year', 'scz', '2020-06-25 11:53:28', NULL, NULL, 'Internship', NULL, 'asd'),
(59, 'xyz', 'innerwork', 'xyz@gmail.com', 'Fresher', 'delhi', 30000, '40000', 'soundarya', '9970016477', 1, '3-4 years', 'Engg-Chemical', 'shdagfyetyegldgqued', '2020-06-25 12:05:41', NULL, 'yegdyter3trydgyd', 'Job', ',Cake PHP,Client relationship Management', NULL),
(60, 'Hr Executive', 'Innerwork Solutions ', 'anil.chaurasia@innerworkindia.', NULL, NULL, NULL, 'Unpaid', 'Anil Chaurasia', '9487980784', 1, '45 days', 'MBA 1st Year', '-Responsible for end to end recruitment services.\r\n-Salary will be 2Lac to 3lac(Per Annum) + incentive\r\n-Sourcing, Screening, Validating candidates as per client specification.\r\n-Deliver the revenue goals as planned for the business unit.\r\n-Front end our ', '2020-07-01 08:37:52', NULL, 'Innerwork provides full-range human resources and IT solutions to help businesses improve hiring and digital infrastructure for the effective functioning of the company. Founded with a purpose to find the right balance of quality hiring and smooth on-boarding, Innerwork believes in understanding the business inside-out and be a strategic partner in the business journey.', 'Internship', NULL, NULL),
(61, 'Business Development Executive', 'Innerwork Solutions ', 'anil.chaurasia@innerworkindia.', NULL, NULL, NULL, 'Unpaid', 'Anil Chaurasia', '9487980784', 1, '45 days', 'BBM Fresher', '1)  If you have chosen a career that does not fulfill your dreams, read further. \r\n2)  If you wish to move to Business Development Profile from your existing work, this is the right place.  \r\n3) If you are already good with sales, we assure you that you c', '2020-06-30 11:50:45', NULL, 'Innerwork provides full-range human resources and IT solutions to help businesses improve hiring and digital infrastructure for the effective functioning of the company. Founded with a purpose to find the right balance of quality hiring and smooth on-boarding, Innerwork believes in understanding the business inside-out and be a strategic partner in the business journey.', 'Internship', NULL, NULL),
(62, 'PHP Developer', 'Innerwork Solutions ', 'anil.chaurasia@innerworkindia.', NULL, NULL, NULL, 'Unpaid', 'Anil Chaurasia', '9187980784', 0, '45 days', 'BE/BTech 1st Year', 'Write â€œcleanâ€, well-designed code\r\nProduce detailed specifications\r\nTroubleshoot, test and maintain the core product software and databases to ensure strong optimization and functionality\r\nContribute in all phases of the development lifecycle\r\nFollow ', '2020-06-30 11:50:52', NULL, 'Innerwork provides full-range human resources and IT solutions to help businesses improve hiring and digital infrastructure for the effective functioning of the company. Founded with a purpose to find the right balance of quality hiring and smooth on-boarding, Innerwork believes in understanding the business inside-out and be a strategic partner in the business journey.', 'Internship', NULL, NULL),
(63, 'test', 'test', 'test@gnk.com', 'Experience', 'Lucknow', 15000, '35000', 'sdjshjdh', '6568455845', 1, '3-4 years', 'Engg-CSE', 'test', '2020-06-30 04:25:57', NULL, 'test', 'Job', ',Java developer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `education` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `mobileNum` varchar(15) NOT NULL,
  `skill` varchar(2000) NOT NULL,
  `interest` varchar(2000) NOT NULL,
  `exp` varchar(12) NOT NULL,
  `file` varchar(2000) NOT NULL,
  `jobpost_id` int(11) DEFAULT 0 COMMENT '0=jobseeker other then applied job',
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`id`, `name`, `gender`, `city`, `education`, `email`, `mobileNum`, `skill`, `interest`, `exp`, `file`, `jobpost_id`, `dateTime`) VALUES
(15, 'Pardeep Kumar', 'Male', 'Chandigarh', 'MBA Marketing', 'pardeeppunia@yahoo.in', '09017590176', '', '', '', '', 0, '2020-04-23 06:03:38'),
(26, 'Sagar Kumar Sahoo', 'Male', 'BENGALURU', 'MCA', 'sagarsahoo500@gmail.com', '09778359822', '', '', '', '', 0, '2020-05-09 05:25:11'),
(27, 'Amit Agrawal ', 'Male', 'Bengaluru ', 'Diploma in Sales & Marketing Management ', 'amit.agrawal2104@gmail.com', '9620023236', '', '', '', '', 0, '2020-05-09 11:18:46'),
(28, 'Sumana R', 'Female', 'Bangalore', 'BCA', 'sumana.dhondale@innerworkindia.com', '9739900914', '', '', '', '', 0, '2020-05-09 15:36:09'),
(29, 'Hafeez Abubacker', 'Male', 'Thrissur', 'Bsc computer science', 'hafeezpa80@gmail.com', '9544498904', '', '', '', '', 0, '2020-05-11 00:51:04'),
(50, 'ANISH M PRASAD', 'Male', 'Bangalore', 'MBA', 'anishmp86@gmail.com', '98951654444', 'Digital Marketiing', 'Digital Marketing', '4-5 years', 'ANISH M PRASAD (C V ).docx', 0, '2020-05-14 07:58:29'),
(51, 'Shridhar', 'Male', 'Bangalore', 'BE(cse)', 'shridharduttaragi4@gmail.com', '8197750300', 'Java, web development, SQL, core python', 'Drawing, Riding, ', '0-1 year', 'resume.pdf', 0, '2020-05-14 12:43:09'),
(54, 'keerthana .C', 'Female', 'Bangalore', 'MCA', 'keerthana.chinnadurai1410@gmail.com', '07598591014', 'HTML,CSS,Javascript,PHP,MYSQL', 'Web developer and designer', '0-1 year', 'C_Keerthana_Web Developer.docx', 0, '2020-05-15 16:50:35'),
(56, 'Ashok Chouhan', 'Male', 'Jodhpur', 'B.Tech Civil', 'ACchouhan@gmail.com', '+917976920728', 'Civil engineering, technical sales engineer, sales officer', 'Construction site, technical sales', '2-3 years', '1585479579333_ASHOK CV-1 for marketing.docx', 0, '2020-05-18 03:07:34'),
(57, 'NIJANTHAN', 'Male', 'BANGALORE', 'COMPUTER SCIENCE ENGINERING', 'nijanthansap@gmail.com', '6374338940', 'DIGITAL MARKETING - SEO ANALYST POSITION', 'SEO - SEM', 'Others', 'NIJANTHAN RAJASEKARAN_SEO  RESUME.docx', 0, '2020-05-18 09:22:29'),
(58, 'Arpita Sharma', 'Female', 'bengaluru', 'BE ETC', 'arpita.pkv@gmail.com', '07848838700', '', '', '', '', 0, '2020-05-18 14:19:07'),
(65, 'Ravikiran', 'Male', 'chennai', 'B.E Production engineering', 'proraviki@gmail.com', '9789945062', 'c,java,python,html,css,react-native,javascript,sql', 'programming,problem solving,ethical hacking', '0-1 year', '', 0, '2020-05-21 17:11:31'),
(66, 'Aditya Kumar Mahalik', 'Male', 'Bhubaneswa', 'B.Tech', 'adityakumarmahalik@gmail.com', '7978173296', 'Python, Django, AWS', 'Python', '0-1 year', '1590115252_ADITYA KUMAR MAHALIK.pdf', 0, '2020-05-22 02:40:59'),
(69, 'Anil', 'Male', 'Bangalore', 'MBA', 'akc.nke@gmail.com', '09513355620', 'Ja', 'Business development', '2-3 years', 'false', 0, '2020-05-22 13:26:52'),
(83, 'Pradeep ', 'Male', 'Coimbatore', 'BCA', 'pradeeprpbro@gmail.com', '9080791130ok', ',Php developer,Codeigniter Framework', ',Web development,Back end', '0-1 year', '1590389560_pradeep resume final.pdf', 0, '2020-05-25 06:52:50'),
(87, 'Vidushi kohli', 'Female', 'Jodhpur', 'Pursuing B.B.A 2nd  YEAR want to do internship', 'vidushi.kohli12@gmail.com', '7230832806', ',Good English Vocabulary,Excelent Communication skills,Microsoft Excel ,Client relationship Management,,Marketing,Accounts manager', ',Business analyst,Media, Communication and writing,Marketing Executive', '0-1 year', 'false', 0, '2020-05-28 08:27:26'),
(88, 'Naresh K', 'Male', 'Thiruttani', 'BCA', 'muralinaresh2000@gmail.com', '6383241309', ',Php developer, C, C++', ',Admin and Payroll', '0-1 year', '1590735521_Naresh.K.pdf', 0, '2020-05-29 06:58:46'),
(89, 'Adish chandra shrivastava', 'Male', 'Gorakhpur', 'Mca', 'adi240192@gmail.com', '9565528415', ',,Content writing,Software developer,Presentation Skills ', ',Content Writer,Digital Marketing', '0-1 year', '', 0, '2020-05-30 07:49:51'),
(90, 'Dwaipayan Dutta', 'Male', 'Kolkata', 'MBA', 'duttadwaipayan999@gmail.com', '09875394101', ',,Python, R, SQL, SPSS,MySQL', ',Business analyst, ', '2-3 years', '1590996985_Updated CV.pdf', 0, '2020-06-01 07:36:53'),
(91, 'Gokul Balasubramaniam', 'Male', 'Coimbatore', 'Bachelor of Computer Applications', 'gokulbalu17@gmail.com', '8072465826', ',Php developer,Java developer', ',Web Development', '0-1 year', 'false', 0, '2020-06-01 13:59:38'),
(92, 'Anitha', 'Female', 'Coimbatore', 'BCA', 'rtanithas@gmail.com', '6385542870', ',Java developer', ',Java ', '0-1 year', 'false', 0, '2020-06-01 14:51:01'),
(93, 'Pooja sharma', 'Female', 'Jaipur', 'B.tech', 'poojasharma94928@gmail.com', '8739935966', ',Php developer', ',Html bootstrap javascript php', '0-1 year', '1591087312_resu.pdf', 0, '2020-06-02 08:43:07'),
(94, 'T. Madhanraj', 'Male', 'Mettupalay', 'Diploma ', 'madhan333rocky@gmail.com', '7010939118', ',Android, Java,Android,Java ', ',,software developer,', '0-1 year', '', 0, '2020-06-03 12:21:54'),
(95, 'shubham raj laxmi', 'Female', 'dehradun', 'prefinal year of btech', 'shubhamrajlaxmi282@gmail.com', '9801147064', ',c++, c, c#, python, web development, word, exel, spreedsheets, content writing, management skills', ',wen development ,  content writing, python, managemnt', '0-1 year', '1591509509_shubham raj laxmi resume final.pdf', 0, '2020-06-07 05:58:41'),
(96, 'Pradeep', 'Male', 'covai', 'BCA', 'pradeeprpbro@gmail.com', '9080791130', ',Php developer', ',web develop', '0-1 year', '', 0, '2020-06-09 13:22:07'),
(97, 'Naresh K', 'Male', 'Thiruttani', 'BCA', 'muralinaresh2000@gmail.com', '6383241309', ',Php developer,Java developer', ',Web developer', '0-1 year', '1591765851_Naresh.K.pdf', 0, '2020-06-10 05:11:16'),
(98, 'Mounika PNRS', 'Female', 'Bangalore', 'B.Tech', 'neelimap557@gmail.com', '9886568999', ',Android Developer', ',software developer', '0-1 year', '1591813790_Mounika_Android_App_Developer_Fresher.doc', 0, '2020-06-10 18:30:01'),
(99, 'Akilan R', 'Male', 'Namakkal', 'B.E', 'akilmechaccet2016@gmail.com', '9677757197', ',Python, MS SQL, HTML5', ',software developer', '0-1 year', '1591978813_Akilan Raja.pdf', 0, '2020-06-12 16:20:29'),
(100, 'Ramya Ramachandran ', 'Female', 'Bengaluru', 'Human Resources ', 'rrramya85@gmail.com', '9108437909', ',Talent Acquisition ,Employee Engagement ', ',Human Resource', 'Others', '1591986660_Ramya TA Resume New(1).pdf', 0, '2020-06-12 18:31:12'),
(101, 'Namrata das', 'Female', 'Bangalore', 'Btech', 'dasnamrata46@gmail.com', '7008758132', ',,Core java,SQL,html,css', ',Learning new things', '0-1 year', '', 23, '2020-06-15 10:49:00'),
(102, 'Namrata das', 'Female', 'Bangalore', 'Btech', 'dasnamrata46@gmail.com', '7008758132', ',Core java,SQL,html,css', ',Data warehouse,Software Engineer', '0-1 year', '', 23, '2020-06-17 05:35:55'),
(103, 'Rakesh S', 'Male', 'Bengaluru', 'BE', 'rakesh123410101999@gmail.com', '960652759', ',,Python3 ,Numpy,Tensorflow,Pandas,Html,HTML ,Web design,Websites designers ', ',Cricket ,Tech games', '0-1 year', '', 0, '2020-06-17 09:37:14'),
(104, 'Subhashree Subhadarshinee', 'Female', 'BHUBANESWA', 'Btech CSE with specialization in Big Data Analytics', 'subhashree06797@gmail.com', '09090200974', ',Java developer,Javascript ,Front End Developer,Big data ', ',Java Development,Backend Developer,software developer', '0-1 year', 'false', 0, '2020-06-19 05:40:55'),
(105, 'Sivani Ardhamala', 'Female', 'Bangalore', 'M.sc computer science', 'sivaniardhanala1119@gmail.com', '9398121578', ',,,Python,Django,Css,JavaScript,Html,Sqlite,MySQL,Postgresql,MongoDB', ',Python developer', '0-1 year', 'false', 0, '2020-06-20 06:15:29'),
(106, 'Akhil Dua', 'Male', 'New Delhi', 'BTech', 'akhildua1995@gmail.com', '9582544009', ',Power BI Analyst', ',,Business analyst', '4-5 years', '1592641491_Resume_Akhil Dua.pdf', 0, '2020-06-20 08:24:53'),
(110, 'anil', 'Male', 'Barama', 'be', 'navneetrj1@gmail.com', '0988 788 8469', ',Android Developer', ',Advertising and marketing', '3-4 years', '', 45, '2020-06-22 11:56:58'),
(111, 'demo', 'Male', 'lucknow', 'MCA', 'mishrasudhanshu0786@gmail.com', '9650582922', ',Php developer,', ',IT Recruiter', '0-1 year', '1592904971_sudhanshucv.pdf', 0, '2020-06-23 09:36:16'),
(112, 'sudhanshu', 'Male', 'lucknow', 'MCA', 'mishrasudhanshu0786@gmail.com', '9650582922', ',php', ',it', '0-1 year', '', 0, '2020-06-23 09:55:28'),
(113, 'sudhanshu', 'Male', 'lucknow', 'MCA', 'mishrasudhanshu0786@gmail.com', '9650582922', ',php', ',it', '0-1 year', '', 0, '2020-06-23 09:55:50'),
(114, 'sudhanshu', 'Male', 'lucknow', 'MCA', 'mishrasudhanshu0786@gmail.com', '9650582922', ',php', ',it', '0-1 year', '', 0, '2020-06-23 09:58:49'),
(115, 'Dipanshu', 'Male', 'demo', 'MCA', 'dipanshugupta58@gmail.com', '0000000000', ',Php developer', ',Admin and Office', '0-1 year', '1592906447_aws.pdf', 0, '2020-06-23 10:01:08'),
(116, 'sudhanshu', 'Male', 'lko', 'MCA', 'sudhanshumishra@gmail.com', '9629225058', ',Communication skills', ',Accountants', '0-1 year', '1592909875_sudhanshucv.pdf', 0, '2020-06-23 10:57:56'),
(117, 'sudhanshu', 'Male', 'lko', 'MCA', 'mishrasudhanshu0786@gmail.com', '9652582922', ',Cake PHP', ',Associate Editor', '0-1 year', '1592912142_sudhanshucv.pdf', 0, '2020-06-23 11:35:45'),
(118, 'Ankita Gohil', 'Female', 'Rajula', 'MCA', 'anki30gohil@gmail.com', '9737930959', ',,MySQL,Rest api', ',,Python skill enhancement', '0-1 year', '1593064522_Anikita Resume-R.pdf', 0, '2020-06-25 05:55:36'),
(119, 'Archana Singh', 'Female', 'New Delhi', 'M.COM', 'archana.singh099@gmail.com', '9811365309', ',Accounts manager', ',Account and Finance', 'Others', '1593154418_Archana Singh -1732020.pdf', 0, '2020-06-26 06:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `referal_job`
--

CREATE TABLE `referal_job` (
  `referal_jobid` int(11) NOT NULL,
  `referal_jobemail` varchar(255) DEFAULT NULL,
  `referal_jobmobile` varchar(255) DEFAULT NULL,
  `referal_jobfmobile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referal_job`
--

INSERT INTO `referal_job` (`referal_jobid`, `referal_jobemail`, `referal_jobmobile`, `referal_jobfmobile`) VALUES
(2, 'Avinash kumar', '8541024010', '7878787878'),
(3, 'Avinash kumar', '8541024010', '7878787878'),
(4, 'Acvhjhk', '8687698769', '0809809809'),
(5, 'dsffffffffff', '2333333333', '2122222222'),
(6, 'navneetrj1@gmail.com', '9887888469', '9887888469'),
(7, 'navneetrj1@gmail.com', '9887888469', '8386061475'),
(8, 'avintest@gmail.com', '4343434343', 'tst@gmail.com'),
(9, 't@gmail.com', '9999999999', 'v@gmail.com'),
(10, 'navneetrj1@gmail.com', '9887888469', 'cryseona@gmail.com ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interest`
--

CREATE TABLE `tbl_interest` (
  `interest_id` int(11) NOT NULL,
  `interest_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_interest`
--

INSERT INTO `tbl_interest` (`interest_id`, `interest_name`) VALUES
(1, 'Human Resource'),
(2, 'Computer and IT'),
(3, 'Management'),
(4, 'Advertising and marketing'),
(5, 'Science and Engineering'),
(6, 'Sales and Retail'),
(7, 'Account and Finance'),
(8, 'Protective Services'),
(9, 'Admin and Office'),
(10, 'Business Operations'),
(11, 'Customer Services'),
(12, 'Media, Communication and writing'),
(13, 'Education '),
(14, 'Recruiter'),
(15, 'IT Recruiter'),
(16, 'HR Recruiter'),
(17, 'Consultant'),
(18, 'Execuitive'),
(19, 'HR Manager'),
(20, 'Engineer'),
(21, 'Software engineer'),
(22, 'technical trainer'),
(23, 'Associate'),
(24, 'Business analyst'),
(25, 'system engineer'),
(26, 'system admin'),
(27, 'software developer'),
(28, 'Data warehouse'),
(29, 'data analyst'),
(30, 'data mining'),
(31, 'data administrator'),
(32, 'QA analyst'),
(33, 'tester'),
(34, 'QA tester'),
(35, 'Hardware engineer'),
(36, 'network engineer'),
(37, 'CCNA Engineer'),
(38, 'Project Manager'),
(39, 'Trainee'),
(40, 'Relationship Manager'),
(41, 'Retail Manager'),
(42, 'Delivery Manager'),
(43, 'Sales Manager'),
(44, 'Development Manager'),
(45, 'Marketing Executive'),
(46, 'Risk Management'),
(47, 'SEO Manager'),
(48, 'Project Manager'),
(49, 'Operations Executive'),
(50, 'Marketing Executive'),
(51, 'Development Executive'),
(52, 'Digital Marketing'),
(53, 'Channel Manager'),
(54, 'Marketing Consultant'),
(55, 'SEO Manager'),
(56, 'Media Marketing'),
(57, 'Data Scientist'),
(58, 'Analyst'),
(59, 'Business analyst'),
(60, 'Design Engineer'),
(61, 'Software Engineer'),
(62, 'Statistics Analyst'),
(63, 'Senior Associate'),
(64, 'Sales Executive'),
(65, 'Sales Manager'),
(66, 'Process Executive'),
(67, 'Operations'),
(68, 'Executive'),
(69, 'Senior Executive'),
(70, 'Accounts'),
(71, 'Manager'),
(72, 'Tally'),
(73, 'Associate'),
(74, 'Auditor'),
(75, 'Bank Teller'),
(76, 'Caller'),
(77, 'Financial Analyst'),
(78, 'Tax Analyst'),
(79, 'network Programming'),
(80, 'Network Admin '),
(81, 'CCNA expert'),
(82, 'Nework analyst'),
(83, 'Network Trainer'),
(84, 'Network Protocols'),
(85, 'Technical Support'),
(86, 'IT Help Desk'),
(87, 'Dekstop support'),
(88, 'Admin and Payroll'),
(89, 'Invoice Making'),
(90, 'Security'),
(91, 'Accountants'),
(92, 'Accounts Assistants'),
(93, 'New Associate'),
(94, 'Senior Associate'),
(95, 'Head Business Operations'),
(96, 'Operations management'),
(97, 'Service Delivery'),
(98, 'Team Management'),
(99, 'Back Office Operations'),
(100, 'Telecaller'),
(101, 'Voice Process'),
(102, 'Non-Voice Process'),
(103, 'BPO'),
(104, 'Email and Chat Process'),
(105, 'Customer Support'),
(106, 'Data Entry'),
(107, 'Client Service Delivery'),
(108, 'Technical Writer'),
(109, 'Associate Editor'),
(110, 'Associate Director'),
(111, 'Content Writer'),
(112, 'Content Analyst'),
(113, 'content development'),
(114, 'Content Marketing'),
(115, 'Internet Advertising '),
(116, 'Social Media Advertising'),
(117, 'Media Management'),
(118, 'Digital Media Manager'),
(119, 'Event Manager'),
(120, 'Graphics Designer'),
(121, 'Trainer'),
(122, 'Counsellor'),
(123, 'Learning and development');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE `tbl_skills` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_skills`
--

INSERT INTO `tbl_skills` (`skill_id`, `skill_name`) VALUES
(1, 'Recruiter'),
(2, 'Talent Acquisition '),
(3, 'HR Coordinator'),
(4, 'Staffing '),
(5, 'Excelent Communication skills'),
(6, 'Onboarding skills'),
(7, 'Developer'),
(8, 'Php developer'),
(9, 'Front End Developer'),
(10, 'Java developer'),
(11, 'Big data '),
(12, 'Hadoop Developer'),
(13, 'Spark and scala'),
(14, 'PHP Laravel Developer'),
(15, 'Cake PHP'),
(16, 'Wordpress Developer'),
(17, 'MySQL'),
(18, 'MongoDB'),
(19, 'Power BI Analyst'),
(20, 'Javascript '),
(21, 'Spring Developer'),
(22, 'Codeigniter Framework'),
(23, 'Full Stack Developer'),
(24, 'AWS Cloud Security'),
(25, 'IBM Cloud'),
(26, 'AWS EMR'),
(27, 'Marketing'),
(28, 'Relationship Building'),
(29, 'Strong Analytical Skills'),
(30, 'Presentation Skills '),
(31, 'Microsoft Excel '),
(32, 'Monitoring and Evaluation'),
(33, 'Media planning'),
(34, 'Team Handling skills'),
(35, 'Team Leader'),
(36, 'Strong Communication skills'),
(37, 'Social Marketing'),
(38, 'Interpersonal Skills'),
(39, 'Promotional event handler'),
(40, 'Media Strategy Builder'),
(41, 'SEM'),
(42, 'SEO'),
(43, 'Brand Awareness'),
(44, 'Pyspark Developer'),
(45, 'R programmer'),
(46, 'Power BI Analyst'),
(47, 'UX and UI designer'),
(48, 'Android Developer'),
(49, 'Apps Developer'),
(50, 'c and c++ Developer'),
(51, 'Us staffing'),
(52, 'Communication skills'),
(53, 'Client relationship Management'),
(54, 'Outbount sales '),
(55, 'social marketing'),
(56, 'customer satisfaction'),
(57, 'Tally'),
(58, 'Accounts manager'),
(59, 'Tally erp '),
(60, 'Microsoft Excel '),
(61, 'Bank Audit'),
(62, 'Chatered Accountant'),
(63, 'Financial Reporting'),
(64, 'Report analyst'),
(65, 'Office Skills'),
(66, 'CCNA'),
(67, 'Router and switch admin'),
(68, 'Routing protocols'),
(69, 'VOIP Services'),
(70, 'Infrastructure Services'),
(71, 'LAN,WAN,MAN,and PAN'),
(72, 'Troubleshooting expert'),
(73, 'Cisco Packet Tracer'),
(74, 'Firewall '),
(75, 'Office 365'),
(76, 'DBA Mysql'),
(77, 'MS Outlook'),
(78, 'Inventory managemnet'),
(79, 'Record Keeping skills'),
(80, 'process analyst'),
(81, 'testing'),
(82, 'maual testing'),
(83, 'computer science'),
(84, 'content Moderation'),
(85, 'Business modelling'),
(86, '24/7 support '),
(87, 'Calling'),
(88, 'Phone Etiquettes'),
(89, 'Communication skills'),
(90, 'Multiple Languages'),
(91, 'Positive Attitude'),
(92, 'Good English Vocabulary'),
(93, 'Knowledge Retention'),
(94, 'Organization skills'),
(95, 'IT knowledge'),
(96, 'Strategy planning'),
(97, 'Tactics and Executions'),
(98, 'Creative Mindset'),
(99, 'Latest Digital marketing trends'),
(100, 'Writing Skills'),
(101, 'Good Blogger'),
(102, 'Employer value'),
(103, 'Public Speaker'),
(104, 'Goosle Analytics'),
(105, 'Content management'),
(106, 'Creating and editing skills'),
(107, 'Exceptional creativity and innovation skills'),
(108, 'Problem solving skills'),
(109, 'Work ethics'),
(110, 'Technology Knowledge');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(90) NOT NULL,
  `role` varchar(10) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `role`, `dateTime`) VALUES
(1, 'admin@gmail.com', '$2y$10$RCS87YXnjmW3UuL6yAEzmeqW8x/2OGOMPvPYDg/WO/P7NBf3F4.jG', 'ADMIN', '2020-03-07 10:28:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collegeportal`
--
ALTER TABLE `collegeportal`
  ADD PRIMARY KEY (`college_info_id`);

--
-- Indexes for table `freelancer`
--
ALTER TABLE `freelancer`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referal_job`
--
ALTER TABLE `referal_job`
  ADD PRIMARY KEY (`referal_jobid`);

--
-- Indexes for table `tbl_interest`
--
ALTER TABLE `tbl_interest`
  ADD PRIMARY KEY (`interest_id`);

--
-- Indexes for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `collegeportal`
--
ALTER TABLE `collegeportal`
  MODIFY `college_info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelancer`
--
ALTER TABLE `freelancer`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `internship`
--
ALTER TABLE `internship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `jobpost`
--
ALTER TABLE `jobpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `jobseeker`
--
ALTER TABLE `jobseeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `referal_job`
--
ALTER TABLE `referal_job`
  MODIFY `referal_jobid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_interest`
--
ALTER TABLE `tbl_interest`
  MODIFY `interest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
