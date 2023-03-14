<?php
    $servername = "localhost";
    $username = "helper";
    $password = "vmm_123";
    $database = "book_flights";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT CityName, Airport,Country FROM Cities";
    $cities = $conn->query($sql);

    $conn->close();

    // Function to Create Custom UL Menu for Airport Choice
    function buildUlMenu($cities,$OptionList,$Option)
    {
        $ulMenu = "<ul id='$OptionList' class='$OptionList'>"; // Open UL Menu (HTML Element)
        foreach($cities as $item) {
            $currentCityName = $item["CityName"]; // Store City Name from the current database row 
            $liOption = "<li class='$Option' name='$currentCityName' id='$currentCityName'>"; // Define LI Option Element
            // Append the LI Option Element (with the current city item from the database) to the UL Menu Element
            $ulMenu .= $liOption. "<img src='Images/airplane.png' alt='Airpline Image Image'>"."<p>$currentCityName</p>"."</li>";
        }
        $ulMenu .= "</ul>"; // Close the UL Menu

        return $ulMenu; // Return the full UL Menu
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Balkan Travel</title>
    </head>
    <body>
        <form action="" method="">

            <!-- Menus Container (Element) for Flight Setup (Flight Airline, From and To Airports, Airports Switch Button, Flight Date) -->
            <div class="Container_FlightForm">
                
                <!-- Menu Element for Flight From Airport Choice -->
                <div class="Menu_FromAirport">
                    <div id="SelectField_FromAirport">
                        <input type="text" name="SelectField_FromAirport_Text" id="SelectField_FromAirport_Text" placeholder="From" autocomplete="off">
                    </div>

                    <?php 
                        echo buildUlMenu($cities,"OptionsList_FromAirport","Option_FromAirport"); // Call Function to Create Custom UL Menu for "From Airport Choice"
                    ?>

                </div>
                
                <!-- Menu Element for Flight To Airport Choice -->
                <div class="Menu_ToAirport">
                    <div id="SelectField_ToAirport">
                        <input type="text" name="SelectField_ToAirport_Text" id="SelectField_ToAirport_Text" placeholder="To" autocomplete="off">
                    </div>

                    <?php 
                        echo buildUlMenu($cities,"OptionsList_ToAirport","Option_ToAirport"); // Call Function to Create Custom UL Menu for "To Airport Choice"
                    ?>

                </div>

                <!-- Menu Element for Flight Type Choice -->
                <div class="Menu_FlightType">
                    <select class="Selector_FlightType" id="Selector_FlightType" name="Selector_FlightType" onchange="flightTypeChoice()">
                        <option class="Option_FlightType" id="One way" value="One way">One way</option>
                        <option class="Option_FlightType" id="Return" value="Return">Return</option>
                    </select>
                </div>






                <!-- Pick Element for Flight Date Choice (One way flight) -->








                <!-- Pick Element for Flight Return Date Choice (return flight) -->
                <div>
                    <div class="Container_NoReturnFlightDate" id="Container_NoReturnFlightDate">
                        <p class="hideNoReturn">No Return</p>
                    </div>















                </div>

                <div class="Container_ShowFlightsButton">
                    <button type="button" class="Show_Flights" alt="Show Flights">Show Flights</button>
                </div>

                <!-- Menu Element Button for Airports Choices Swap -->
                <div class="Container_SwapButton">
                    <button type="button" class="Swap_Airports" onclick="swapAirports()" alt="Swap Airports"></button>
                </div>

            </div>

            <!-- Page and Elements' Scripts -->
            <script src="Scripts/Script_AirportMenu.js" type="text/javascript"></script>
            <script src="Scripts/Script_FlightType.js" type="text/javascript"></script>
        </form>
    </body>
</html>
