<?php
session_start();
include '../conn.php'; // Include the database connection class
include '../components/header.php';

// Instantiate the database connection class
$database = new conn();
$conn = $database->conn; // Get the PDO connection

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user status from the database using PDO
    $query = "SELECT status FROM tbl_users WHERE id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user_status = $stmt->fetchColumn(); // Fetch only the status column

} else {
    $user_status = 'offline'; // Default status for guests
}

// Display the appropriate navbar
if ($user_status === 'online') {
    include '../components/navbar-u.php';
} else {
    include '../components/navbar.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What Drives Electricity Rates to Go Up, Up and Away?</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
 <?php
        echo '<div class="header-image w-full h-[250px] overflow-hidden">';
        echo '<img src="' . 'https://png.pngtree.com/background/20230618/original/pngtree-fiery-3d-render-of-a-light-bulb-amidst-darkened-lamps-picture-image_3752942.jpg' . '" alt="Bridge" class="w-full h-full object-cover" />';
        echo '</div>';
    ?>
<body class="bg-white">

    <div class="container mx-auto py-6 flex flex-col md:flex-row md:space-x-4">
        <!-- Main Content Section -->
        <div class="order-1 md:order-2 w-full md:w-3/5 bg-white p-6 rounded-md">
            <h2 class="text-3xl font-bold text-[#87CEEB] mb-8">What Drives Electricity Rates to Go Up, Up and Away?</h2>
            <p class="text-justify font-bold">by Jose Ramon G. Albert, Ph.D</p>
            <p class="text-justify pb-4">Posted: 27 September 2013 at http://nap.psa.gov.ph</p>

            <hr class="border-t-4 border-b-4 border-[ffdb19] mt-1 mb-8">
        <p class="text-justify mb-5">They say you can’t live without love, but nowadays, electricity can be just as important.</p>
        <p class="text-justify mb-5">Electricity has become a prime mover of almost every economic and social activity. It is hard to imagine living today in the twenty first century without it. That is why we frown every time there is news about an increase in the power bill.</p>
        <p class="text-justify mb-5">Last month, we came up with an online article about the prices of food. Now we are going to tackle a commodity that is more complex, in terms of pricing—electricity. We will explore where our electricity tariffs go and how our rates compare with our neighbours in Southeast Asia. We will also look at the price movements of the different segments of the electricity bill in the last few years.</p> 
        </hr>
        <br>
        <h6 class="font-bold mb-5">WHAT DO WE ACTUALLY PAY FOR?</h6>
                <p class="text-justify mb-5">Whenever we look at the electricity bill, we tend to ignore the different items which make up the sum of what we pay for. In effect, when there is a sharp increase in the total power tariff, we often blame the company from which the bill came from, the distribution utility. Power distributors like the Manila Electric Co. (Meralco), Visayan Electric Co. (Veco), and Davao Light take the hit from consumers whenever there are abrupt increases in the cost of electricity. However, most price movements are actually outside the control of the power distributors and are merely pass-through charges from other segments of the power industry. It just so happens that it is the job of the distribution utility to deliver the power from producers to the consumers so they are the ones handing us the bill.</p>
                <p class="text-justify mb-5">The electricity industry is not a single, vertically-aligned system where there is only one producer of the good. The Philippine power sector can actually be broken down into three major segments: (a) generation, (b) transmission, and (c) distribution, supply and metering. Table 1 shows the schedule rates for the month of September of the country’s largest power distributor, Meralco. Meanwhile, Table 2 shows the total power cost for the typical consumer segments.</p>
                <p class="text-justify mb-5">Distribution, supply and metering (distribution) is the segment of the electricity industry in which most people are more familiar with. These are the companies like Meralco, Veco, and the electric cooperatives in the provinces. It is the segment of the industry which delivers power from the producers to the households, commercial establishments, and industries.  Essentially, the job of electricity distributors is similar to the job of retail traders. They buy the goods (in this case, electricity) from the different sources, then sell them to the consumers. The tariff which goes to distribution companies accounts for 16.0 percent of the total power bill (Table 3 and Figure 1). The rate of distribution varies across customer segments. It is generally progressive, which means that as you increase your power consumption, the amount you pay per kilowatt hour also increases.  The words electricity tariffs, electricity rates, and electricity bill will be used interchangeably in this article.</p>
                <p class="text-justify mb-5">Generation is the segment of the electricity industry which produces power from sources like coal, diesel, natural gas, hydro and geothermal. Generation makes up the biggest component of our electricity tariff. Roughly 65.0 percent (Table 3 and Figure 1) of what customers pay for goes to this segment. This means that for every one peso you spend on your power bill, about 65 cents goes to the power generators. The amount you pay for this component goes to the various generation companies who own power plants. Unlike the distribution charge which is progressive, all customer segments pay the same amount for generation.</p>
                <p class="text-justify mb-5">The transmission segment is the bridge between the power generators and the distribution utilities. It is the superhighway in which electricity travels through: from the power plants in the provinces to the cities, where the demand is high. Transmission makes up 8.7 percent of the power bill.</p>
                <p class="text-justify mb-5">On top of charges we pay for the actual production and delivery of electricity, we are also charged for other things in the total electricity tariffs. A 10.0 percent value added tax is imposed on electricity generation. Consumers also shoulder the universal charge, a uniform rate (P0.31 per kwh) in the power bill which funds the government’s missionary electrification program and environmental protection.</p>
                <p class="text-justify">Distribution utilities offer discounts to certain factions of society. The law requires distribution utilities to implement a lifeline discount; it is a reduction on the distribution cost enjoyed by the lower consumer segments. Customers who consume between one to 20 kilowatt hours per month can enjoy a 100.0 percent discount in the distribution rate (Table 1). As consumption goes up, the discount eases. Customers consuming 71.0 to 100.0 kilowatt hours per month can enjoy a discount of 20.0 percent. These subsidies are shouldered by customers with higher power consumption. Senior citizens are also given discounts on power. Anyone above 60 years old is entitled to a 5.0 percent discount on their electricity bill.</p>
                <br>
        <h6 class="font-bold mb-5">THE ELECTRICITY BASKET</h6>
                <p class="text-justify mb-5">The generation rate appears as a uniformed component in the schedule of rates. The generation charge which you see in the electricity bill is actually a blended rate, which means it is the weighted average of the price from the various power producers where the electricity was sourced. Different sources sell the power they produce at different rates.</p>
                <p class="text-justify mb-5">The United States’ Energy Information Agency (EIA) provides a benchmark on the cost of generation per fuel type (Table 4 and Table 5). Even though the actual price levels may be different, resulting from the differences in the scale and technology of the power facilities operating there and here, the figures they provide can still be used as a guide to compare the generation cost of the different power sources.</p>
                <p class="text-justify mb-5">Data from the EIA show that based on the projected power cost of facilities entering by 2018, the cheapest is wind at P3.72 per kilowatt hour. Following wind is geothermal, at P3.85 per kilowatt hour. Power sourced from hydroelectric facilities cost P3.88 per kilowatt hour. Although the cost of energy generated from wind and hydro are the lowest, they also have the lowest capacity factor. This means that their availability to generate power is also less (Table 4 and Table 5). </p>
                <p class="text-justify mb-5">Among the fossil fuel-based sources, conventional combined cycle (Natural Gas) produce the cheapest power, at P2.89 per kilowatt hour while conventional coal-produced power is P4.30 per kilowatt hour. Solar thermal, off-shore wind, and photovoltaic solar produce the most expensive electricity at P11.24 per kilowatt hour, P9.52 per kilowatt hour, and P6.20 per kilowatt hour, respectively (Table 4 and Table 5). The price of power from diesel-fed power plants is reported to produce power at P13.00 to P20.00 per kilowatt hour.</p>
                <p class="text-justify mb-5">Each power source has its characteristics. The cheaper ones like wind and hydro tend to be intermittent and unreliable. Wind mills can only produce power when the winds are blowing strong. Hydroelectric power plants operate at limited capacity during the dry seasons. The price of power from coal, gas, and diesel are more reliable in terms of delivery but they are dependent on supply availability and are vulnerable to shocks in world market prices. That is why it is imperative for power distributors to maintain a diverse portfolio of power supply contract with different sources.</p>
                <p class="text-justify mb-5">Data from the Department of Energy (DOE) show that in 2012 (Table 6), 38.8 percent of the total power generated in the country is produced by coal-fired power plants. Natural Gas power plants, meanwhile, account for 26.9 percent of the energy mix. Geothermal and hydro both account for 14.0 percent of the country’s total energy production.</p>
                <br>
        <h6 class="font-bold mb-5">WAHAT IS DRIVING POWER RATES?</h6>
                <p class="text-justify mb-5"><strong>Generation.  </strong>Distribution utilities are generally free to choose their suppliers. In theory, they would opt to blend the optimal mix of energy sources, which will minimize the cost of electricity for the consumers. For Meralco, which supplies power to 75.0 percent of the power in Luzon and 55.0 percent of the whole country, most of the electricity it delivers are tapped from state-owned National Power Corp. (Napocor), the Whole Sale Electricity Spot Market (WESM), and three independent power producers (IPPS), namely the Quezon Power (coal) and the natural gas-fired powers plants, Santa Rita and San Lorenzo.</p>
                <p class="text-justify mb-5">The Napocor is controlled and managed by the government; the electricity produced by the power plants under its wing is sold at a regulated rate. The rates are adjusted every quarter to reflect changes in fuel cost and the foreign exchange rate. The WESM, meanwhile, is a trading platform for power generators and buyers of electricity such as distribution utilities. Prices in WESM are dictated by market forces in contrast to set prices under power supply agreements between generation companies and utilities. Power distributors are mandated by law to source at least 10.0 percent of their power requirements from the WESM.</p>
                <p class="text-justify mb-5">Data from 2007 to 2012 (Table 7, Figure 2) show a lot of volatility in the price of generation, but there is no evidence to show that there is a trend, either upward or downward, being taken by the generation charge since 2007. WESM price, which is more reflective of real market conditions in the electricity, appears to be the most volatile. The lowest price it hit was P1.80 per kilowatt hour while the highest price it hit was P20.70 per kilowatt hour. Price of power from the WESM tends to be sensitive to supply shocks and seasonal factors. For example, WESM prices peaked during the El Nino dry spell when cheap power from hydroelectric power plants was not available to ease price levels. The blended rate moves more closely with the price with the price of power from Napocor and the independent power producers.</p>
                <p class="text-justify mb-5"><strong>Transmission. </strong>The National Grid Corporation of the Philippines, the private corporation operating the country’s transmission system, is allowed to change their transmission rates monthly but the maximum price which they can bill their customers is regulated by the Energy Regulatory Commission (ERC). Data from 1998 to 2012 (Table 8, Figure 3) show that there appears no upward or downward trend in being followed by the price of transmission.</p>
                <p class="text-justify mb-5"><strong>Distribution. </strong>Similar to the transmission rate, the distribution rate is also regulated by the state through the ERC. Most major distribution utilities (not all) are allowed to adjust their rates based on projected capital expenditure through performance-based rate (PBR) setting mechanism. Data from 2006 to 2012 show there is generally no trend in the movement of distribution price across the time period. The price of distribution, however, is slightly higher in 2012 as compared to 2006 (P0.50 per kilowatt hour on the average) as a result of the PBR adjustments from the series 2008 to 2012 (Table 9, Figure 4).</p>
                <p class="text-justify mb-5">Changes in the price of distribution and transmission have minimal impact on the power bill. The price of generation, on the other hand, accounts for a greater chunk of what the consumers pay for. The generation rate also tends to be more volatile than the price of transmission and distribution because the two are regulated and the generation is not. The increases we see in the power bill and hear from the news is brought mostly about by changes in the generation charge. Supply and demand situations play a large role. When cheap source of electricity like hydro is unavailable, especially during the dry season, power tariffs tend to be high. We also tend to use more expensive sources of power when demand is high. To add to that, the price of fuel (Table 5 and Table 6), such as coal and diesel, accounts for half of the generation price. A sharp jump in the world market price for coal would have a substantial impact on the price of power.</p>
                <br>
                <h6 class="font-bold mb-5">HOW DO WE COMPARE WITH OUR NEIGHBORS?</h6>
                <p class="text-justify mb-5">Filipinos pay one of the highest electricity rates in the region. Data from Asean Center for Energy show that among the ten countries Southeast Asia in 2007, the country’s  ranks as having the third highest residential electricity tariffs, fifth highest for commercial, and fourth highest in terms of industrial electricity tariffs (Table 10).</p>
                <p class="text-justify mb-5">A study conducted by the Perth-based consultancy firm, International Energy Consultants (IEC), placed the rates in Luzon as having the ninth highest electricity tariffs of the 44 countries surveyed. Meralco commissioned the IEC to conduct the study.</p>
                <p class="text-justify mb-5">According to the IEC study, one of the main reasons why the country’s power rates are higher compared to other countries is the absence of government subsidies for electricity, unlike countries like Indonesia, Thailand, and Malaysia, where electricity rates are subsidized by the government. These subsidies eat up a large chunk of public budget. In Indonesia, for example, energy subsidies accounts for 24.0 percent of the 2013 public expenditure plan.</p>
                <br>
                <h6 class="font-bold mb-5">A WAY OUT</h6>
                <p class="text-justify mb-5">The Electric Power Industry Reform Act (Epira) provides for retail competition and open access. This scheme took effect in June 2013. In the regime of open access, large power consumers, like manufacturing facilities and big malls, can freely choose their electricity supplier. The power users will not be forced to buy supply from distribution utilities and they can now choose which supplier can provide them the electricity that will be cheaper for their operations. The rationale for open access is that competition among electricity supplier will put a downward pressure on electricity price and ultimately lead to cheaper power in the long run.</p>
                <br>
            </div>

    

         <!-- Left Sidebar Section -->
         <div class="order-2 md:order-1 w-full md:w-1/5 bg-white border-r p-6 rounded-md md:pt-20">
        </div>

        <!-- Right Sidebar Section -->
        <div class="order-3 md:order-3 w-full md:w-1/5 bg-white p-6 rounded-md border-l">
            <div class="search-box mb-6">
                <input type="text" placeholder="Search" class="w-full px-4 py-2 border rounded-md focus:outline-none">
            </div>

            <h2 class="text-xl font-semibold text-black border-l-4 pl-2 border-blue-500 mb-4">Categories</h2>
            <ul class="space-y-2">
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">Announcements</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">Bids & Awards</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">CSR Programs</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">Generation Mix</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">Maintenance Schedule</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">National Stories</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">News & Events</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">Power Rate</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">Uncategorized</a></li>
                <hr>
            </ul>

            <h2 class="text-xl font-semibold text-gray-800 border-l-4 pl-2 border-blue-500 mt-8 mb-4">Archives</h2>
            <ul>
                <!-- Add archive links here -->
            </ul>
        </div>


        </div>
    <?php
    include '../components/links.php';
    include '../components/footer.php';
    ?>
</body>
</html>