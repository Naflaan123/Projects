/*// Define user profiles
const userProfiles = {};









function getBotResponse(input, userId) {
    // Check if user profile exists, if not create one
    if (!userProfiles.hasOwnProperty(userId)) {
        userProfiles[userId] = {
            name: "Guest",
            preferredSport: null // Add more profile attributes as needed
            
        };
    }

    // Define arrays of responses for each input
    const responses = {
        "hello": ["Hello there!", "Hi!", "Hey!"],
        "whats your name": ["I'm Alex! Whats your name?", "I go by Alex! Whats your name?", "My name is Alex! Whats your name?"],
        "what your name": ["I'm Alex! Whats your name?", "I go by Alex! Whats your name?", "My name is Alex! Whats your name?"],
        "what is your name": ["I'm Alex! Whats your name?", "I go by Alex! Whats your name?", "My name is Alex! Whats your name?"],
        "your name": ["I'm Alex! Whats your name?", "I go by Alex! Whats your name?", "My name is Alex! Whats your name?"],
        "your name please": ["I'm Alex! Whats your name?", "I go by Alex! Whats your name?", "My name is Alex! Whats your name?"],
        "can i know your name": ["I'm Alex! Whats your name?", "I go by Alex! Whats your name?", "My name is Alex! Whats your name?"],
        "website": ["This is a retail business selling sporting and recreational goods, including sportswear, sporting equipment and related general merchandise."],
        "available": ["We have a variety of products in our store. Can you be more specific?"],
        "badminton": ["Yonex/Li-Ning <br><br> Rackets <br> carrier bags <br> shoes <br> grips"],
        "soccer": ["Some of the popular soccer brands available, <br><br>  Addidas <br> Puma <br> Nike <br> Reebok"],
        "hockey": ["Most of the hockey gear will be available amongst these brands, <br><br> Adrenaline Design, INC <br> Boost Oxygen <br> Duke Cannon <br> Elite Hockey <br> Fischer Hockey"],
        "basketball": ["The latest arrivals of basketball apperals are, <br><br> Night Crawl Mesh Shorts <br> Hoop'n'Grub T-Shirt <br> Hoop'n'Grub Mesh Shorts <br> HC Zeitgeist Compression T-Shirt"],
        "thank you": ["Pleasure is mine 😊"], 
        "thankyou": ["Pleasure is mine 😊"], 
        "great": ["👍"], 
        "li-ning rackets": ["<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzDpcGyDZikwaK9BM9ItY9xBaRJY3psOV43g&s' alt='' />"],
        "yonex rackets": ["<img src='https://www.yonex.com/media/catalog/product/n/f/nf-jr_cyan.png?quality=80&fit=bounds&height=300&width=240&canvas=240:300' alt='' />"],
        "addidas": ["<img src='https://i.ebayimg.com/thumbs/images/g/IEcAAOSwMVZmTbFx/s-l225.jpg' alt='' />"],
        "reebok": ["<img src='https://i.ebayimg.com/thumbs/images/g/UOIAAOSwQElmMsZO/s-l225.jpg' alt='' />"],
        "nike": ["<img src='https://lh6.googleusercontent.com/proxy/O32bZ0axkxOzSEZFIEVdVuhdWwj5whhiNoxV5SPtBl9ykRz0dhNK0LJva4d-JGLum6orftkzqPdGR-Pkey-HRg-dnrOpvDF29Exwf9O8E1OsCzfB5THOK83Ibu6CGFmoaJ936Hq5' alt='' />"],
    };

    




    // Check for specific inputs and return corresponding responses
    if (input.toLowerCase().includes("badminton")) {
        return responses["badminton"];
    } else if (input.toLowerCase().includes("soccer")) {
        return responses["soccer"];
    } else if (input.toLowerCase().includes("basketball")) {
        return responses["basketball"];
    } else if (input.toLowerCase().includes("hockey")) {
        return responses["hockey"];
    } else if (input.toLowerCase().includes("website")) {
        return responses["website"];
    } else if (input.toLowerCase().includes("available")) {
        return responses["available"];
    } else if (input.toLowerCase().includes("lining") || input.toLowerCase().includes("li-ning")) {
        return responses["li-ning rackets"];
    } else if (input.toLowerCase().includes("yonex")) {
        return responses["yonex rackets"];
    } else if (input.toLowerCase().includes("addidas")) {
        return responses["addidas"];
    } else if (input.toLowerCase().includes("reebok")) {
        return responses["reebok"];
    } 

    // Define fuzzy logic mappings
    const fuzzyMappings = {
        "badminton": ["badminton", "badmintonn", "badminon", "badmin", "batminton", "batmintonn", "batminton", "batmin", "badmiton", "bdmiton", "bdminton"],
        "soccer": ["soccer", "sokker", "soocer", "sooccer", "socccer", "sokcer", "soccor", "sccer", "soccr"],
        "basketball": ["basketball", "baskettball", "baskettbal", "baskteball", "bascketball", "basketbal"],
        "hockey": ["hockey", "hoockey", "hocky", "hockeey", "hokkey", "hocke", "hckey"]
        
    };

    



    
    // Construct regex patterns for each keyword
    const regexMappings = {};
    for (const keyword in fuzzyMappings) {
        if (fuzzyMappings.hasOwnProperty(keyword)) {
            const variations = fuzzyMappings[keyword];
            const regexPattern = variations.map(variation => `\\b${variation}\\b`).join('|'); // \b to match whole word
            regexMappings[keyword] = new RegExp(regexPattern, 'i'); // 'i' flag for case-insensitive matching
        }
    }
    
    // Check if input matches any regex pattern and return corresponding responses
    for (const keyword in regexMappings) {
        if (regexMappings.hasOwnProperty(keyword)) {
            const regex = regexMappings[keyword];
            if (regex.test(input.toLowerCase())) {
                return responses[keyword];
            }
        }
    }

    // Check if the input has predefined responses
    const inputLower = input.toLowerCase();

    // Check for greetings
    if (inputLower.includes("hi") || inputLower.includes("hello") || inputLower.includes("ih")) {
        const hiResponses = ["Hello there!", "Hi!", "Hey!"];
        const randomIndex = Math.floor(Math.random() * hiResponses.length);
        return hiResponses[randomIndex];
    }

    // Check if the input matches any predefined responses
    if (responses.hasOwnProperty(inputLower)) {
        const randomIndex = Math.floor(Math.random() * responses[inputLower].length);
        return responses[inputLower][randomIndex];
    }

    // Update user profile based on input
    if (inputLower.includes("my name is") || inputLower.includes("i am") || inputLower.includes("i'm") || inputLower.includes("im") || inputLower.includes("this is")) {
        let nameStartIndex;
        if (inputLower.includes("my name is")) {
            nameStartIndex = inputLower.indexOf("my name is") + 11; // Start index of name
        } else if (inputLower.includes("i am")) {
            nameStartIndex = inputLower.indexOf("i am") + 5; // Start index of name
        } else if (inputLower.includes("i'm")) {
            nameStartIndex = inputLower.indexOf("i'm") + 4; // Start index of name
        } else if (inputLower.includes("im")) {
            nameStartIndex = inputLower.indexOf("im") + 3; // Start index of name
        } else if (inputLower.includes("this is")) {
            nameStartIndex = inputLower.indexOf("this is") + 8; // Start index of name
        }
        userProfiles[userId].name = input.substring(nameStartIndex).trim(); // Extract name from input
        return "Nice to meet you, " + userProfiles[userId].name + "!";
    }

    // Handle the query about the least popular sport
    if (inputLower.includes("what is the least popular sport")) {
        if (userProfiles[userId].mostPopularSport) {
            return "The least popular sport is " + userProfiles[userId].mostPopularSport + ".";
        } else {
            userProfiles[userId].expectingSportAnswer = true;
            return "I don't know. Do you know?";
        }
    }

    // Save the answer if the bot is expecting it
    if (userProfiles[userId].expectingSportAnswer) {
        userProfiles[userId].mostPopularSport = input.trim();
        userProfiles[userId].expectingSportAnswer = false;
        return "Got it! I'll remember that the least popular sport is " + userProfiles[userId].mostPopularSport + ".";
    }

    // Handle goodbye
    if (inputLower.includes("goodbye") || inputLower.includes("bye") || inputLower.includes("good bye")) {
        const userName = userProfiles[userId].name || "user " + userId;
        return "Goodbye, " + userName + "! Have a great day!";
    }

    // If no predefined response or action matches, suggest asking something else
    const botResponse = "Try asking something else!";
    
    return botResponse; 
    



    
}*/




/*// Handle fetching list data
if (input.toLowerCase().includes("fruits")) {
    // Return a Promise
    return new Promise((resolve, reject) => {
        // Make an AJAX request to fetch JSON data
        $.getJSON('http://localhost/chatbotAI%20-%20Copy1/data.json')
            .then(data => {
                // Access the 'fruits' property from the JSON data
                const fruits = data.fruits;
                resolve(fruits); // Resolve the Promise with fruits data
            })
            .catch(error => {
                console.error('There was a problem with fetching fruits data:', error);
                reject("Sorry, I couldn't fetch the fruits data."); // Reject the Promise with an error message
            });
    });
}*/





// Define user profiles
const userProfiles = {};

function getBotResponse(input, userId) {
    // Check if user profile exists, if not create one
    if (!userProfiles.hasOwnProperty(userId)) {
        userProfiles[userId] = {
            name: "Guest",
            preferredSport: null // Add more profile attributes as needed
        };
    }

    // Define arrays of responses for each input
    const responses = {
        "hello": ["Hello there!", "Hi!", "Hey!"],
        "whats your name": ["I'm Alex! Whats your name?", "I go by Alex! Whats your name?", "My name is Alex! Whats your name?"],
        "what is your name": ["I'm Alex! Whats your name?", "I go by Alex! Whats your name?", "My name is Alex! Whats your name?"],
        "what your name": ["I'm Alex! Whats your name?", "I go by Alex! Whats your name?", "My name is Alex! Whats your name?"],
        "what is your name": ["I'm Alex! Whats your name?", "I go by Alex! Whats your name?", "My name is Alex! Whats your name?"],
        "your name": ["I'm Alex! Whats your name?", "I go by Alex! Whats your name?", "My name is Alex! Whats your name?"],
        "your name please": ["I'm Alex! Whats your name?", "I go by Alex! Whats your name?", "My name is Alex! Whats your name?"],
        "can i know your name": ["I'm Alex! Whats your name?", "I go by Alex! Whats your name?", "My name is Alex! Whats your name?"],
        "website": ["This is a retail business selling sporting and recreational goods, including sportswear, sporting equipment and related general merchandise."],
        "available": ["We have a variety of products in our store. Can you be more specific?"],
        "badminton": ["Yonex/Li-Ning <br><br> Rackets <br> carrier bags <br> shoes <br> grips"],
        "cricket": ["Gray-Nicolls Legend Cricket Bat<br>GM Diamond Original Cricket Bat<br>Kookaburra Kahuna Pro Cricket Bat<br>SG Sunny Tonny Classic Cricket Bat<br>Adidas Libro 1.0 Cricket Bat<br>New Balance DC 1080 Cricket Bat<br>MRF Genius Grand Edition Cricket Bat<br>Spartan MS Dhoni Run Cricket Bat<br>Puma EvoSpeed Cricket Bat<br>SS Gladiator Cricket Bat<br>Asics Gel-Peake Cricket Shoes<br>Adidas Adipower Vector Cricket Shoes<br>New Balance CK4040 Cricket Shoes<br>Puma EvoSpeed Bowling Cricket Shoes<br>Gray-Nicolls Atomic Cricket Shoes"],
        "clothing": ["Nike Dry-FIT DNA Basketball Shorts<br>Adidas Own The Game Basketball Shorts<br>Jordan Dri-FIT Air Shorts<br>Under Armour Curry Basketball Shorts<br>Puma x TMC Basketball Shorts<br>New Balance Basketball Knit Shorts<br>Anta Basketball Shorts<br>Li-Ning Wade Basketball Shorts<br>Converse Chuck Taylor Basketball Shorts<br>Nike LeBron Men's Basketball Jacket<br>Adidas Dame Graphic T-Shirt<br>Jordan Jumpman Classics Graphic T-Shirt<br>Under Armour SC30 T-Shirt<br>Puma Hoops Basketball T-Shirt<br>New Balance Kawhi Leonard Graphic T-Shirt"],
        "list": ["Yonex Arcsaber 11<br>Yonex Voltric Z Force II<br>Li-Ning N9-II<br>Victor Jetspeed S 12<br>Babolat X-Feel Origin Power<br>Yonex Nanoray 900<br>Victor Thruster K 9900<br>Li-Ning Turbo Charging 75D<br>Carlton Powerblade Superlite<br>Ashaway Phantom X-Speed II<br>Wilson Recon PX9000<br>Black Knight Ion Cannon PSX"],
        "soccer": ["Some of the popular soccer brands available, <br><br>  Addidas <br> Puma <br> Nike <br> Reebok"],
        "foot ball": ["Nike Mercurial Superfly<br>Adidas Predator Freak<br>Puma Future Z<br>Nike Tiempo Legend<br>Adidas Copa Mundial<br>New Balance Furon<br>Under Armour Magnetico Pro<br>Mizuno Rebula<br>Umbro Medusae<br>Nike Phantom GT<br>Puma Ultra<br>Adidas X Ghosted"],
        "hockey": ["Most of the hockey gear will be available amongst these brands, <br><br> Adrenaline Design, INC <br> Boost Oxygen <br> Duke Cannon <br> Elite Hockey <br> Fischer Hockey"],
        "basketball": ["The latest arrivals of basketball apperals are, <br><br> Night Crawl Mesh Shorts <br> Hoop'n'Grub T-Shirt <br> Hoop'n'Grub Mesh Shorts <br> HC Zeitgeist Compression T-Shirt"],
        "thank you": ["Pleasure is mine 😊"], 
        "thankyou": ["Pleasure is mine 😊"], 
        "great": ["👍"], 
        "li-ning rackets": ["<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzDpcGyDZikwaK9BM9ItY9xBaRJY3psOV43g&s' alt='' />"],
        "yonex rackets": ["<img src='https://www.yonex.com/media/catalog/product/n/f/nf-jr_cyan.png?quality=80&fit=bounds&height=300&width=240&canvas=240:300' alt='' />"],
        "addidas": ["<img src='https://i.ebayimg.com/thumbs/images/g/IEcAAOSwMVZmTbFx/s-l225.jpg' alt='' />"],
        "reebok": ["<img src='https://i.ebayimg.com/thumbs/images/g/UOIAAOSwQElmMsZO/s-l225.jpg' alt='' />"],
        "bat": ["<img src='https://www.cricket-hockey.com/67139-home_default/gray-nicolls-shockwave-gen-23-300-cricket-bat-2024.jpg' alt='' />"],
        "shorts": ["<img src='https://cdn2.basket4ballers.com/179656-small_default/short-nike-dri-fit-dna-lt-photo-blue-black-white-dv9478-435.jpg' alt='' />"],
        "nike": ["<img src='https://lh6.googleusercontent.com/proxy/O32bZ0axkxOzSEZFIEVdVuhdWwj5whhiNoxV5SPtBl9ykRz0dhNK0LJva4d-JGLum6orftkzqPdGR-Pkey-HRg-dnrOpvDF29Exwf9O8E1OsCzfB5THOK83Ibu6CGFmoaJ936Hq5' alt='' />"]
    };











    // Check for specific inputs and return corresponding responses
    if (input.toLowerCase().includes("badminton")) {
        return responses["badminton"];
    } else if (input.toLowerCase().includes("soccer")) {
        return responses["soccer"];
    } else if (input.toLowerCase().includes("basketball")) {
        return responses["basketball"];
    } else if (input.toLowerCase().includes("hockey")) {
        return responses["hockey"];
    } else if (input.toLowerCase().includes("website")) {
        return responses["website"];
    } else if (input.toLowerCase().includes("available")) {
        return responses["available"];
    } else if (input.toLowerCase().includes("lining") || input.toLowerCase().includes("li-ning")) {
        return responses["li-ning rackets"];
    } else if (input.toLowerCase().includes("yonex")) {
        return responses["yonex rackets"];
    } else if (input.toLowerCase().includes("addidas")) {
        return responses["addidas"];
    } else if (input.toLowerCase().includes("reebok")) {
        return responses["reebok"];
    } else if (input.toLowerCase().includes("list")) {
        return responses["list"];
    } else if (input.toLowerCase().includes("foot ball")) {
        return responses["foot ball"];
    }  else if (input.toLowerCase().includes("clothing")) {
        return responses["clothing"];
    } else if (input.toLowerCase().includes("cricket")) {
        return responses["cricket"];
    } else if (input.toLowerCase().includes("bat")) {
        return responses["bat"];
    } else if (input.toLowerCase().includes("shorts")) {
        return responses["shorts"];
    }


  


    // Define fuzzy logic mappings
    const fuzzyMappings = {
        "badminton": ["badminton", "badmintonn", "badminon", "badmin", "batminton", "batmintonn", "batminton", "batmin", "badmiton", "bdmiton", "bdminton"],
        "soccer": ["soccer", "sokker", "soocer", "sooccer", "socccer", "sokcer", "soccor", "sccer", "soccr","scer","socer"],
        "basketball": ["basketball", "baskettball", "baskettbal", "baskteball", "bascketball", "basketbal"],
        "hockey": ["hockey", "hoockey", "hocky", "hockeey", "hokkey", "hocke", "hckey"]
    };

    // Construct regex patterns for each keyword
    const regexMappings = {};
    for (const keyword in fuzzyMappings) {
        if (fuzzyMappings.hasOwnProperty(keyword)) {
            const variations = fuzzyMappings[keyword];
            const regexPattern = variations.map(variation => `\\b${variation}\\b`).join('|'); // 
            regexMappings[keyword] = new RegExp(regexPattern, 'i'); // 'i' flag for case-insensitive matching
        }
    }

    // Check if input matches any regex pattern and return corresponding responses
    for (const keyword in regexMappings) {
        if (regexMappings.hasOwnProperty(keyword)) {
            const regex = regexMappings[keyword];
            if (regex.test(input.toLowerCase())) {
                return responses[keyword];
            }
        }
    }

    

    // Check if the input has predefined responses
    const inputLower = input.toLowerCase();

    // Check for greetings
    if (inputLower.includes("hi") || inputLower.includes("hello") || inputLower.includes("ih")) {
        const hiResponses = ["Hello there!", "Hi!", "Hey!"];
        const randomIndex = Math.floor(Math.random() * hiResponses.length);
        
        
        
        return hiResponses[randomIndex];
    }

    // Check if the input matches any predefined responses
    if (responses.hasOwnProperty(inputLower)) {
        const randomIndex = Math.floor(Math.random() * responses[inputLower].length);
        const response = responses[inputLower][randomIndex];

        
        if (response === "Try asking something else!") 
            
        

        return response;
    }

    // Update user profile based on input
    if (inputLower.includes("my name is") || inputLower.includes("i am") || inputLower.includes("i'm") || inputLower.includes("im") || inputLower.includes("this is")) {
        let nameStartIndex;
        if (inputLower.includes("my name is")) {
            nameStartIndex = inputLower.indexOf("my name is") + 11; // Start index of name
        } else if (inputLower.includes("i am")) {
            nameStartIndex = inputLower.indexOf("i am") + 5; // Start index of name
        } else if (inputLower.includes("i'm")) {
            nameStartIndex = inputLower.indexOf("i'm") + 4; // Start index of name
        } else if (inputLower.includes("im")) {
            nameStartIndex = inputLower.indexOf("im") + 3; // Start index of name
        } else if (inputLower.includes("this is")) {
            nameStartIndex = inputLower.indexOf("this is") + 8; // Start index of name
        }
        userProfiles[userId].name = input.substring(nameStartIndex).trim(); // Extract name from input
        return "Nice to meet you, " + userProfiles[userId].name + "!";
    }

    // Handle the query about the least popular sport
    if (inputLower.includes("what is the least popular sport")) {
        if (userProfiles[userId].mostPopularSport) {
            return "The least popular sport is " + userProfiles[userId].mostPopularSport + ".";
        } else {
            userProfiles[userId].expectingSportAnswer = true;
            return "I don't know. Do you know?";
        }
    }

    // Save the answer if the bot is expecting it
    if (userProfiles[userId].expectingSportAnswer) {
        userProfiles[userId].mostPopularSport = input.trim();
        userProfiles[userId].expectingSportAnswer = false;
        return "Got it! I'll remember that the least popular sport is " + userProfiles[userId].mostPopularSport + ".";
    }

    

    // Handle goodbye
    if (inputLower.includes("goodbye") || inputLower.includes("bye") || inputLower.includes("good bye")) {
        const userName = userProfiles[userId].name || "user " + userId;
        return "Goodbye, " + userName + "! Have a great day!";
    }

    // If no predefined response or action matches, suggest asking something else
    const botResponse = "Try asking something else!";

    
        

    return botResponse;
}
