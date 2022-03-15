-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 01:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worldnews_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `short_headline` varchar(255) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `subtitle` text NOT NULL,
  `article` text NOT NULL,
  `summary` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `genre_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `short_headline`, `headline`, `subtitle`, `article`, `summary`, `date`, `time`, `genre_id`, `writer_id`) VALUES
(1, 'Russia invading on multiple fronts, former Ukrainian defence minister says', 'Russia invading on multiple fronts, former Ukrainian defence minister says', 'US secretary of state says Russia plans to encircle and threaten Kyiv; Ukrainian spokesman condemns ‘totally pointless attack’.', '\"Russian forces have unleashed an attack of Ukraine on the orders of Vladimir Putin, who announced a “special military operation” at dawn, amid warnings from world leaders that it could spark the biggest war in Europe since 1945.\r\n\r\nWithin minutes of Putin’s short televised address, at about 5am Ukrainian time, explosions were heard near major Ukrainian cities, including the capital, Kyiv.\r\n\r\nThe scope of the Russian attack appears to be massive. Ukraine’s interior ministry reported that the country was under attack from cruise and ballistic missiles, with Russia appearing to target infrastructure near major cities such as Kyiv, Kharkiv, Mariupol and Dnipro.\r\n\r\nExplosions from artillery rockets lit up the night sky as shelling began near Mariupol, video showed. A senior adviser to Ukraine’s interior ministry said that it appeared Russian troops may soon move on Kharkiv, which is about 20 miles from the border. Locals in Kyiv sought safety in bomb shelters as explosions were heard outside the city.\"', 'Russia appears to be targeting military infrastructure in early strikes with explosions reported at airfields, military headquarters and military warehouses', '2022-02-24', '14:10:11', 1, 1),
(2, 'Retrofitting scheme could become ‘problem’ as landlords may use it to end tenancies\r\n', 'Retrofitting scheme could become ‘problem’ as landlords may use it to end tenancies\r\n', '500,000 homes to be retrofitted by 2030 under plans to boost home energy efficiency\r\n', '\" \r\nThe Government’s major new retrofitting scheme could become a “problem” as landlords may use it to end tenancies, the Dáil’s Public Accounts Committee (PAC) has been told.\r\n\r\nThe warning came from the Residential Tenancies Board (RTB).\r\n\r\nThe Government launched its landmark Home Energy Upgrade Scheme earlier this month with plans to provide grants to people to boost their homes’ energy efficiency as part of plans to fight climate change. The goal is for 500,000 homes to be retrofitted by 2030.\"\r\n', '500,000 homes to be retrofitted by 2030 under plans to boost home energy efficiency\r\n', '2022-02-25', '10:15:00', 2, 2),
(3, 'Senior gardaí agree to suspend industrial action that delayed Gsoc investigations\r\n', 'Senior gardaí agree to suspend industrial action that delayed Gsoc investigations\r\n', 'Officers returning to non-core duties as final resolution to dispute over an allowance\r\n', '\"Senior gardaí have agreed to suspend industrial action that has resulted in delays to some Garda Síochána Ombudsman Commission (Gsoc) investigations.\r\n\r\nSuperintendents and chief superintendents are returning to non-core duties as a final resolution to a dispute over an availability allowance is awaited.\r\n\r\nThe development in the long-running dispute was confirmed by Department of Justice secretary general Oonagh McPhillips in a letter to the Dáil’s Public Accounts Committee (PAC).\"\r\n', 'Officers returning to non-core duties as final resolution to dispute over an allowance\r\n', '2022-02-26', '11:15:00', 3, 2),
(4, 'Ryanair suspends flights to Ukraine following Russian invasion\r\n', 'Ryanair suspends flights to Ukraine following Russian invasion\r\n', 'Airline awaits information updates from EU safety agencies after civilian airspace is closed\r\n', '\"Ryanair said on Thursday that it has suspended flights to and from Ukraine for at least 14 days after local authorities closed airspace to civilian aircraft overnight as Russia invaded its western neighbour by land, air and sea.\r\n\r\nHowever, the Irish carrier said that it “remains committed” to its routes serving Ukraine and will restore flights as soon as it is safe to do so.\r\n\r\n“Due to the closure of Ukrainian airspace overnight, and the apparent invasion by Russian forces, all Ryanair flights to/from Ukraine have been suspended for at least the next 14 days,” Ryanair said in a statement.\"\r\n', '\"Ryanair said on Thursday that it has suspended flights to and from Ukraine for at least 14 days after local authorities closed airspace to civilian aircraft overnight as Russia invaded its western neighbour by land, air and sea.\r\n\r\nHowever, the Irish carrier said that it “remains committed” to its routes serving Ukraine and will restore flights as soon as it is safe to do so.\r\n\r\n“Due to the closure of Ukrainian airspace overnight, and the apparent invasion by Russian forces, all Ryanair flights to/from Ukraine have been suspended for at least the next 14 days,” Ryanair said in a statement.\"\r\n', '2022-02-27', '12:15:00', 4, 3),
(5, 'U.S. Senator warns Activision CEO about undermining unionization efforts as Raven NLRB hearing wraps\r\n', 'U.S. Senator warns Activision CEO about undermining unionization efforts as Raven NLRB hearing wraps\r\n', 'U.S. Senator warns Activision CEO about undermining unionization efforts as Raven NLRB hearing wraps\r\n', '\"In a letter to Activision Blizzard CEO Bobby Kotick Wednesday, Sen. Tammy Baldwin (D-Wis.) called on Kotick to “negotiate in good faith with the workers and suspend any efforts to undermine your employees’ legal right to form a union and collectively bargain.”\r\n\r\nBaldwin’s letter arrived a day after the conclusion of a National Labor Relations Board hearing between Activision-owned Raven Software, based in Wisconsin, and a group of that company’s quality assurance testers who are attempting to unionize their department. The letter, a copy of which was obtained by The Washington Post, was also sent to Microsoft CEO Satya Nadella. Microsoft recently announced its intentions to purchase Activision Blizzard for nearly $69 billion, pending approval by the Federal Trade Commission.\"\r\n', '\"In a letter to Activision Blizzard CEO Bobby Kotick Wednesday, Sen. Tammy Baldwin (D-Wis.) called on Kotick to “negotiate in good faith with the workers and suspend any efforts to undermine your employees’ legal right to form a union and collectively bargain.”\r\n\r\nBaldwin’s letter arrived a day after the conclusion of a National Labor Relations Board hearing between Activision-owned Raven Software, based in Wisconsin, and a group of that company’s quality assurance testers who are attempting to unionize their department. The letter, a copy of which was obtained by The Washington Post, was also sent to Microsoft CEO Satya Nadella. Microsoft recently announced its intentions to purchase Activision Blizzard for nearly $69 billion, pending approval by the Federal Trade Commission.\"\r\n', '2022-02-28', '13:15:00', 3, 5),
(6, 'legal action against Russia over MH17 disaster\r\n', 'Australia and the Netherlands launch legal action against Russia over MH17 disaster\r\n', 'The two countries will allege Russia breached international aviation law for its role in 2014 downing of the Malaysia Airlines flight over Ukraine\r\n', '\"Australia and the Netherlands have launched legal proceedings against Russia through the International Civil Aviation Organization for the downing of Malaysia Airlines flight MH17.\r\n\r\nThe legal action could compel Russia to take part in stalled negotiations with the two countries, and could also result in it being penalised by the United Nations-linked organisation which is responsible for the administration of international aviation law.\"\r\n', 'The two countries will allege Russia breached international aviation law for its role in 2014 downing of the Malaysia Airlines flight over Ukraine\r\n', '2022-03-14', '07:30:00', 1, 6),
(7, 'Britons should brace for rising Covid cases, says Sajid Javid\r\n', 'Britons should brace for rising Covid cases, says Sajid Javid\r\n', 'Health secretary says jump in cases to be expected after scrapping of rules, but UK is in ‘good position’\r\n', '\"Britons should brace for a rise in Covid infections after the easing of restrictions, the health secretary has said, as the latest figures show rates are increasing as people socialise more.\r\n\r\nSajid Javid said the UK remained in a “very good position” but rising infection rates were to be “expected”. To reduce the risk of serious infection, he urged adults eligible for a booster vaccine to have one, given that one in five had not yet received it.\r\n\r\nThe latest data from the Office for National Statistics Covid-19 Infections Survey showed an increase in cases across the whole of the UK. In the week ending 5 March, one in every 25 people in England, one in 13 in Northern Ireland, one in 18 in Scotland and one in 30 in Wales were estimated to have Covid-19.\"\r\n', 'Health secretary says jump in cases to be expected after scrapping of rules, but UK is in ‘good position’\r\n', '2022-03-14', '10:32:00', 4, 7),
(8, 'Men’s suit removed from UK ‘inflation basket’ as Covid changes working life\r\n', 'Men’s suit removed from UK ‘inflation basket\r\n', 'Doughnuts and coal also removed from list of 700 representative goods and services by ONS\r\n', '\"\r\nThe traditional men’s suit has been removed from the basket of goods used to calculate the annual inflation rate – the latest casualty of the increase in working from home since the start of the Covid pandemic two years ago.\r\n\r\nThe Office for National Statistics said the change in working patterns meant the suit was no longer one of the 700 representative goods and services selected to measure the UK’s cost of living.\r\n\r\nAnnouncing details of this year’s changes, the ONS said a new men’s formal jacket or blazer item was being introduced to ensure men’s formal and business wear was still represented in the selection.\"\r\n', 'Doughnuts and coal also removed from list of 700 representative goods and services by ONS\r\n', '2022-03-14', '09:49:00', 3, 8),
(9, 'Climate change fundamentally affecting European birds, study shows\r\n', 'Climate change fundamentally affecting European birds, study shows\r\n', 'Changes to birds’ size, habits and morphology have been linked to rising temperatures\r\n', '\"Global warming is changing European birds as we know them, a study has found, but it’s not just the increase in temperature that’s to blame.\r\n\r\nResearchers have found that garden warblers, for example, are having a quarter fewer chicks, which has huge implications for the species. Chiffchaffs are laying their eggs 12 days earlier. Some birds are decreasing in size, while others, such as redstarts, are getting larger.\"\r\n', 'Changes to birds’ size, habits and morphology have been linked to rising temperatures\r\n', '2022-03-10', '10:22:00', 5, 9),
(10, 'Signs of premature ageing found in monkeys after hurricane\r\n', 'Signs of premature ageing found in monkeys after hurricane\r\n', 'Rhesus macaques in Puerto Rico appear to have aged by about two years more than expected\r\n', '\"Monkeys that survived a devastating hurricane in Puerto Rico were prematurely aged by the experience, a study has found.\r\n\r\nScientists say the findings suggest that an increase in extreme weather around the world may have negative biological consequences for the humans and animals affected.\r\n\r\nThe scientists said the rhesus macaques that lived through Hurricane Maria in 2017 appeared to have aged by about two years more than expected, equivalent to seven or eight years of human life.\"\r\n', 'Rhesus macaques in Puerto Rico appear to have aged by about two years more than expected\r\n', '2022-02-07', '20:00:00', 5, 9),
(11, 'China shuts down city of 17.5m people in bid to halt Covid outbreak\r\n', 'China shuts down city of 17.5m people in bid to halt Covid outbreak\r\n', 'Authorities adopt a zero tolerance policy in Shenzhen, imposing a lockdown and testing every resident three times\r\n', '\"China’s government has locked down Shenzhen, a city of 17.5 million people, as it tries to contain its worst ever Covid-19 outbreak across multiple provinces, with case numbers tripling from Saturday to Sunday.\r\n\r\nA government notice on Sunday said all residential communities were now under “closed management”, meaning they would be locked down. Every resident would undergo three rounds of testing, for which they were allowed to leave their homes, and all buses and subways were suspended.\"\r\n', 'Authorities adopt a zero tolerance policy in Shenzhen, imposing a lockdown and testing every resident three times\r\n', '2022-03-14', '05:31:00', 4, 10),
(12, 'Russian default on debts no longer ‘improbable’, says IMF head\r\n', 'Russian default on debts no longer ‘improbable’, says IMF head\r\n', 'Fund says a default from Russia after sanctions over its invasion of Ukraine would not trigger a global financial crisis\r\n', '\"A Russian default on its debts after western sanctions over its invasion of Ukraine is no longer “improbable”, but would not trigger a global financial crisis, the head of the International Monetary Fund said on Sunday.\r\n\r\nThe Washington-based fund’s managing director, Kristalina Georgieva, said the sanctions imposed by the United States and other nations were already having a “severe” impact on the Russian economy and would trigger a deep recession there this year. The war in Ukraine will also drive up food and energy prices, leading to hunger in Africa, she added.\"\r\n', 'Fund says a default from Russia after sanctions over its invasion of Ukraine would not trigger a global financial crisis\r\n', '2022-03-13', '18:47:00', 3, 11),
(13, 'Defence firm Sheffield Forgemasters told to end contract with Gazprom\r\n', 'Defence firm Sheffield Forgemasters told to end contract with Gazprom\r\n', 'UK manufacturer – nationalised in 2021 – is supplied gas by Russian state-owned energy company\r\n', '\"The defence manufacturer Sheffield Forgemasters, which was nationalised last summer, has been told by the UK government to terminate an energy contract with the Russian state-owned company Gazprom.\r\n\r\nThe South Yorkshire steelmaker, owned by the Ministry of Defence but largely run independently, is a key supplier for the Trident submarine fleet. It has been told to ditch a deal with Gazprom’s UK arm, in news that was first reported by the Sunday Telegraph.\"\r\n', 'UK manufacturer – nationalised in 2021 – is supplied gas by Russian state-owned energy company\r\n', '2022-03-13', '15:21:00', 3, 11),
(14, 'Pressure on China to distance itself from Russia over war in Ukraine\r\n', 'Pressure on China to distance itself from Russia over war in Ukraine\r\n', 'Moscow ‘asked Beijing for military equipment’\r\n', '\"The United States is expected to put pressure on China today to distance itself from Russia over the war in Ukraine amid reports that Moscow asked Beijing to donate military equipment for its invasion.\r\n\r\nJake Sullivan, the US national security adviser, is due to meet Yang Jiechi, a member of the Chinese Communist Party’s politburo, in Rome.\"\r\n', 'Moscow ‘asked Beijing for military equipment’\r\n', '2022-03-14', '09:40:00', 1, 12),
(15, 'Relaxing of Scottish Covid rules on track despite case data\r\n', 'Relaxing of Scottish Covid rules on track despite case data\r\n', 'At present Sturgeon presides over the toughest Covid restrictions in the UK\r\n', '\"Scotland’s exit from the final legal coronavirus restrictions remains on track after its chief medical officer hailed “very encouraging” signs that deaths and intensive care admissions remain low.\r\n\r\nNicola Sturgeon, the first minister, will outline the next stage of Scotland’s coronavirus strategy tomorrow as case numbers rise and Covid patients are admitted to general hospital wards.\r\n\r\nData from the Office for National Statistics showed that in the first week of March an estimated one in 18 Scots had the virus. There were 1,663 people in hospital on Friday with recently confirmed Covid-19, the highest figure for 13 months.\r\n\r\nIt was reported last week that the number of Covid patients in hospital had passed government forecasts and Scotland was on course for a new record. Orkney\r\n\"\r\n', 'At present Sturgeon presides over the toughest Covid restrictions in the UK\r\n', '2022-03-14', '00:01:00', 4, 13);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'World'),
(2, 'Politics'),
(3, 'Economy'),
(4, 'COVID'),
(5, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `author_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`id`, `first_name`, `last_name`, `author_link`) VALUES
(1, 'Luke', 'Harding', 'https://www.theguardian.com/profile/lukeharding'),
(2, 'Cormac', 'McQuinn', 'www.irishtimes.com/profile/cormac-mcquinn-7.5253588'),
(3, 'Shannon', 'Liao', 'https://www.washingtonpost.com/people/shannon-liao/'),
(4, 'Michael', 'Flink', 'https://www.google.com/search?q=michael+flink'),
(5, 'Alex', 'Ryan', 'https://www.google.com/search?q=alex+ryan'),
(6, 'Sarah', 'Martin', 'https://www.theguardian.com/profile/sarah-martin\r\n'),
(7, 'Rachel', 'Hall', 'https://www.theguardian.com/profile/rachel-hall'),
(8, 'Larry', 'Elliot', 'https://www.theguardian.com/profile/larryelliott\r\n'),
(9, 'Sofia', 'Quaglia', 'https://www.theguardian.com/profile/sofia-quaglia'),
(10, 'Helen', 'Davidson', 'https://www.theguardian.com/profile/helen-davidson\r\n'),
(11, 'Julia', 'Kollewe', 'https://www.theguardian.com/profile/juliakollewe\r\n'),
(12, 'Kieran', 'Southern', 'https://twitter.com/keiransouthern\r\n'),
(13, 'Mark', 'McLaughlin', 'https://www.thetimes.co.uk/profile/mark-mclaughlin?page=1\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_writer` (`writer_id`),
  ADD KEY `fk_article_genre` (`genre_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_article_genre` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_article_writer` FOREIGN KEY (`writer_id`) REFERENCES `writers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
