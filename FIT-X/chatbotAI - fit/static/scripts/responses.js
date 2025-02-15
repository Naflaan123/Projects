/*
// Define user profiles
const userProfiles = {};

function getBotResponse(input, userId) {
    // Check if user profile exists, if not create one
    if (!userProfiles.hasOwnProperty(userId)) {
        userProfiles[userId] = {
            name: "Guest",
            fitnessGoal: null,
            weight: null,
            height: null,
            expectingWeight: false,
            expectingHeight: false
        };
    }
// Define arrays of responses for each input
const responses = {
    "hello": ["Hello there! How can I help with your fitness journey?", "Hi! Ready to get fit?", "Hey! What's your fitness goal today?"],
    "whats your name": ["I'm FitBot! What's your name?", "I go by FitBot! What's your name?", "My name is FitBot! What's your name?"],
    "what is your name": ["I'm FitBot! What's your name?", "I go by FitBot! What's your name?", "My name is FitBot! What's your name?"],
    "your name": ["I'm FitBot! What's your name?", "I go by FitBot! What's your name?", "My name is FitBot! What's your name?"],
    "can i know your name": ["I'm FitBot! What's your name?", "I go by FitBot! What's your name?", "My name is FitBot! What's your name?"],
    "exercise routine": ["I can help you with routines! Do you prefer cardio, strength training, or flexibility exercises?"],
    "cardio": ["Try a 20-minute HIIT session! Warm-up with jumping jacks, then cycle through 30 seconds of burpees, high knees, and mountain climbers. Rest for 30 seconds between rounds."],
    "strength training": ["For strength, aim for compound exercises like squats, deadlifts, and bench presses. Start with 3 sets of 8-10 reps."],
    "flexibility": ["Stretching is key! Try holding each stretch for 30 seconds. Work on your hamstrings, quads, back, and shoulders."],
    "nutrition": ["Nutrition is vital! Focus on a balanced diet with lean proteins, healthy fats, and complex carbs. Do you need meal prep ideas?"],
    "meal prep": ["Try prepping meals like grilled chicken with quinoa and veggies, overnight oats with chia seeds, or a salmon and brown rice bowl."],
    "protein": ["Great sources of protein include chicken breast, eggs, tofu, and lentils. Aim for 0.8-1g of protein per pound of body weight."],
    "fat loss": ["For fat loss, combine strength training with cardio. Caloric deficit is key, so monitor your intake and ensure you're getting enough protein."],
    "muscle gain": ["To gain muscle, focus on progressive overload in strength training and eat in a caloric surplus with plenty of protein."],
    "fitness equipment": ["Basic equipment includes dumbbells, resistance bands, kettlebells, and a yoga mat. Do you need help choosing equipment?"],
    "thank you": ["You're welcome! Keep pushing towards your goals 💪"],
    "thankyou": ["You're welcome! Keep pushing towards your goals 💪"],
    "great": ["You're doing awesome! Keep it up! 👍"],
    "how to lose weight": ["Weight loss is about consistency. Focus on a balanced diet and regular exercise, creating a caloric deficit. Would you like workout or meal suggestions?"],
    "healthy eating": ["Healthy eating includes lean proteins, whole grains, fruits, and vegetables. Limit processed foods and sugar. Need a sample meal plan?"],
    "workout for abs": ["To build abs, combine core exercises like planks, crunches, and leg raises with full-body workouts and proper nutrition."],
    "hydration": ["Stay hydrated! Drink at least 8 glasses of water a day. If you're exercising, increase that to replenish lost fluids."],
    "rest": ["Rest is crucial! Make sure to get 7-9 hours of sleep for optimal recovery. How's your current sleep schedule?"]
};





   
    // Check for each keyword in the input and respond accordingly
    for (const keyword in responses) {
        if (input.toLowerCase().includes(keyword)) {
            const replies = responses[keyword];
            return replies[Math.floor(Math.random() * replies.length)]; // Return a random response
        }
    }

    // Check for goodbye or bye
    if (input.toLowerCase() === "goodbye" || input.toLowerCase() === "bye") {
        return `Goodbye ${userProfiles[userId].name}! Hope you achieve all your fitness goals!`;
    }

    if (input.toLowerCase().includes("train me")) {
        userProfiles[userId].expectingWeight = true; // Set expecting weight to true
        return "Great! Let's get started. Please tell me your weight (in lbs or kg).";
    }

    if (userProfiles[userId].expectingWeight) {
        // Save weight and ask for height
        const weight = parseFloat(input);
        if (!isNaN(weight)) {
            userProfiles[userId].weight = weight; // Store weight
            userProfiles[userId].expectingWeight = false; // Reset expecting weight
            userProfiles[userId].expectingHeight = true; // Set expecting height to true
            return "Thanks! Now, please provide your height (in cm, m, or feet).";
        } else {
            return "Please enter a valid weight.";
        }
    }

    if (userProfiles[userId].expectingHeight) {
        // Save height and suggest a program
        let height;
        if (input.toLowerCase().includes("cm")) {
            height = parseFloat(input) / 100; // Convert cm to meters
        } else if (input.toLowerCase().includes("m")) {
            height = parseFloat(input); // Already in meters
        } else if (input.toLowerCase().includes("feet")) {
            height = parseFloat(input) * 0.3048; // Convert feet to meters
        } else {
            return "Please specify your height in cm, m, or feet.";
        }
        
        userProfiles[userId].height = height; // Store height
        userProfiles[userId].expectingHeight = false; // Reset expecting height

        // Suggest a program based on weight and height
        return suggestTrainingProgram(userProfiles[userId]);
    }



    // Check for injuries and ask for more details
if (input.toLowerCase().includes("injury")) {
    userProfiles[userId].expectingInjuryDetails = true; // Expecting injury details
    return "I see you're concerned about an injury. Could you please describe your injury? For example, is it a sprain, strain, or something else?";
}

// Handle detailed injury descriptions
if (userProfiles[userId].expectingInjuryDetails) {
    userProfiles[userId].injuries = input; // Store injury details
    userProfiles[userId].expectingInjuryDetails = false; // Reset expecting injury details

    // Respond based on the type of injury mentioned
    if (input.toLowerCase().includes("sprain") || input.toLowerCase().includes("strain")) {
        return "Thank you for sharing. For sprains and strains, I recommend gentle stretching and mobility exercises. Would you like a list of specific exercises you can do?";
    } else if (input.toLowerCase().includes("back") || input.toLowerCase().includes("knee")) {
        return "Thank you for sharing. It's important to focus on strengthening and stretching exercises that don't put too much pressure on your back or knee. Would you like to see some exercises tailored for that?";
    } else if (input.toLowerCase().includes("shoulder")) {
        return "Thank you for sharing. For shoulder injuries, it's best to avoid overhead movements. I can suggest some safe and effective shoulder rehabilitation exercises. Would you like that?";
    } else {
        return "Thank you for sharing. Since I didn't catch the specific type of injury, I can suggest general low-impact exercises like walking, swimming, or cycling. Would you like a list of these?";
    }
}




    // Define fuzzy logic mappings for fitness terms
    const fuzzyMappings = {
        "cardio": ["cardio", "cardi", "cardeo", "caridio", "cardo"],
        "strength": ["strength", "strenght", "strenth", "stength"],
        "nutrition": ["nutrition", "nutriton", "nutrion", "nutrtion"],
        "protein": ["protein", "protin", "proten", "protien"],
        "abs": ["abs", "abbs", "ab", "abs workout"],
        "hydration": ["hydration", "hydrate", "hydrating"],
    };

    // Construct regex patterns for each keyword
    const regexMappings = {};
    for (const keyword in fuzzyMappings) {
        if (fuzzyMappings.hasOwnProperty(keyword)) {
            const variations = fuzzyMappings[keyword];
            const regexPattern = variations.map(variation => `\\b${variation}\\b`).join('|'); 
            regexMappings[keyword] = new RegExp(regexPattern, 'i'); 
        }
    }

    // Check if the input has predefined responses
    const inputLower = input.toLowerCase();

    // Check for greetings
    if (inputLower.includes("hi") || inputLower.includes("hello") || inputLower.includes("ih")) {
        const hiResponses = ["Hello there!", "Hi!", "Hey!"];
        const randomIndex = Math.floor(Math.random() * hiResponses.length);
        
        // Change the image source to smiley3.png when the response is a greeting
        const image = document.querySelector('.small-icon');
        image.src = 'fit Photos/smiley3.png';
        
        return hiResponses[randomIndex];
    }

    // Check if the input matches any predefined responses
    if (responses.hasOwnProperty(inputLower)) {
        const randomIndex = Math.floor(Math.random() * responses[inputLower].length);
        const response = responses[inputLower][randomIndex];

        // Change the image source based on the bot response
        const image = document.querySelector('.small-icon');
        if (response === "Try asking something else!") {
            // Change the source attribute to sad.png
            image.src = 'fit Photos/sad.png';
        } else {
            // Change the source attribute to smiley3.png for any other response
            image.src = 'fit Photos/smiley3.png';
        }

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

        const name = input.slice(nameStartIndex).trim(); // Extract name from input
        userProfiles[userId].name = name; // Update user profile with name
        return `Nice to meet you, ${name}! How can I assist you today?`;
    }

    // Fallback response
    return "I'm not sure how to help with that. Try asking something else!";
}

// Chart rendering function
function displayChart() {
    const ctx = document.getElementById('myChart').getContext('2d');
    document.getElementById('myChart').style.display = 'block'; // Show the chart

    // Example data
    const labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Fitness Progress',
            data: [10, 20, 30, 40], // Replace with actual data
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    new Chart(ctx, {
        type: 'line', // You can change this to 'bar', 'radar', etc.
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Chatbot logic to handle user input
function handleUserInput(userInput) {
    if (userInput.toLowerCase() === "show my fitness progress") {
        displayChart(); // Call your chart rendering function
    } else {
        console.log("Unknown command");
    }
}



function suggestTrainingProgram(userProfile) {
    const weight = userProfile.weight;
    const height = userProfile.height;

    // Suggest training program based on weight and height
    if (weight < 70) {
        return "I suggest a balanced mix of cardio and strength training. Start with 3 days of cardio and 2 days of strength per week.";
    } else if (weight < 90) {
        return "Consider focusing on strength training 4 days a week with a mix of cardio on the other days.";
    } else {
        return "A combination of high-intensity cardio and strength training would be beneficial. Aim for 4-5 workouts a week.";
    }
}*/







// Define user profiles
const userProfiles = {};

function getBotResponse(input, userId) {
    // Check if user profile exists, if not create one
    if (!userProfiles.hasOwnProperty(userId)) {
        userProfiles[userId] = {
            name: "Guest",
            fitnessGoal: null,
            weight: null,
            height: null,
            expectingWeight: false,
            expectingHeight: false
        };
    }
// Define arrays of responses for each input
const responses = {
    "hello": ["Hello there! How can I help with your fitness journey?", "Hi! Ready to get fit?", "Hey! What's your fitness goal today?"],
    "whats your name": ["I'm FitBot! What's your name?", "I go by FitBot! What's your name?", "My name is FitBot! What's your name?"],
    "what is your name": ["I'm FitBot! What's your name?", "I go by FitBot! What's your name?", "My name is FitBot! What's your name?"],
    "your name": ["I'm FitBot! What's your name?", "I go by FitBot! What's your name?", "My name is FitBot! What's your name?"],
    "can i know your name": ["I'm FitBot! What's your name?", "I go by FitBot! What's your name?", "My name is FitBot! What's your name?"],
    "exercise routine": ["I can help you with routines! Do you prefer cardio, strength training, or flexibility exercises?"],
    "cardio": ["Try a 20-minute HIIT session! Warm-up with jumping jacks, then cycle through 30 seconds of burpees, high knees, and mountain climbers. Rest for 30 seconds between rounds."],
    "strength training": ["For strength, aim for compound exercises like squats, deadlifts, and bench presses. Start with 3 sets of 8-10 reps."],
    "flexibility": ["Stretching is key! Try holding each stretch for 30 seconds. Work on your hamstrings, quads, back, and shoulders."],
    "nutrition": ["Nutrition is vital! Focus on a balanced diet with lean proteins, healthy fats, and complex carbs. Do you need meal prep ideas?"],
    "meal prep": ["Try prepping meals like grilled chicken with quinoa and veggies, overnight oats with chia seeds, or a salmon and brown rice bowl."],
    "protein": ["Great sources of protein include chicken breast, eggs, tofu, and lentils. Aim for 0.8-1g of protein per pound of body weight."],
    "fat loss": ["For fat loss, combine strength training with cardio. Caloric deficit is key, so monitor your intake and ensure you're getting enough protein."],
    "muscle gain": ["To gain muscle, focus on progressive overload in strength training and eat in a caloric surplus with plenty of protein."],
    "fitness equipment": ["Basic equipment includes dumbbells, resistance bands, kettlebells, and a yoga mat. Do you need help choosing equipment?"],
    "thank you": ["You're welcome! Keep pushing towards your goals 💪"],
    "thankyou": ["You're welcome! Keep pushing towards your goals 💪"],
    "great": ["You're doing awesome! Keep it up! 👍"],
    "how to lose weight": ["Weight loss is about consistency. Focus on a balanced diet and regular exercise, creating a caloric deficit. Would you like workout or meal suggestions?"],
    "healthy eating": ["Healthy eating includes lean proteins, whole grains, fruits, and vegetables. Limit processed foods and sugar. Need a sample meal plan?"],
    "workout for abs": ["To build abs, combine core exercises like planks, crunches, and leg raises with full-body workouts and proper nutrition."],
    "hydration": ["Stay hydrated! Drink at least 8 glasses of water a day. If you're exercising, increase that to replenish lost fluids."],
    "rest": ["Rest is crucial! Make sure to get 7-9 hours of sleep for optimal recovery. How's your current sleep schedule?"],
    "what should I eat before a workout": ["Eat a light snack with carbs and protein, like a banana with peanut butter, about 30 minutes before working out."],
    "eat": ["After a workout, aim for a meal with protein and carbs, like a protein shake and a banana or chicken with sweet potatoes."],
    "often": ["Aim for at least 150 minutes of moderate aerobic activity or 75 minutes of vigorous activity each week, plus strength training twice a week."],
    "macros": ["Macros refer to macronutrients: carbohydrates, proteins, and fats. Balancing them is important for your diet!"],
    "can I lose weight without exercising": ["Yes, weight loss can happen through diet alone by maintaining a caloric deficit, but exercise boosts results and improves health."],
    "count calories": ["Counting calories can help you understand your intake and maintain a caloric deficit or surplus based on your goals."],
    "balanced diet": ["A balanced diet includes a variety of foods: lean proteins, whole grains, healthy fats, and plenty of fruits and vegetables."],
    "motivated": ["Set realistic goals, track your progress, and find a workout buddy! Celebrating small wins helps too."],
    "how to improve my endurance": ["To improve endurance, gradually increase the intensity and duration of your workouts. Incorporate longer cardio sessions!"],
    "what are good snacks": ["Healthy snack options include Greek yogurt, mixed nuts, fruits, or veggie sticks with hummus."],
    "how to build a workout plan": ["Start by defining your goals, then choose a mix of cardio, strength, and flexibility exercises. Schedule them throughout the week!"],
    "what is circuit training": ["Circuit training involves a series of exercises performed back-to-back with minimal rest. It’s great for building strength and endurance!"],
    "how to get rid of belly fat": ["Focus on a combination of diet, strength training, and cardio. Remember, spot reduction isn't possible!"],
    "what is yoga good for": ["Yoga improves flexibility, strength, and mental clarity. It’s also great for stress relief!"],
    "what are bodyweight exercises": ["Bodyweight exercises use your own weight for resistance, like push-ups, squats, and planks. They can be done anywhere!"],
    "how to improve flexibility": ["Incorporate stretching routines into your workouts, and consider activities like yoga or Pilates."],
    "what are the benefits of strength training": ["Strength training builds muscle, boosts metabolism, and improves bone density. It can also enhance mood!"],
    "can I workout every day": ["Yes, but make sure to vary your workouts and include rest days to prevent overtraining!"],
    "what is HIIT": ["High-Intensity Interval Training (HIIT) involves short bursts of intense exercise followed by rest or lower-intensity work."],
    "how to deal with cravings": ["Stay hydrated, keep healthy snacks on hand, and allow occasional treats in moderation!"],
    "how can I track my progress": ["Keep a workout journal, take progress photos, or use fitness apps to log your workouts and nutrition."],
    "what are the best exercises for beginners": ["Start with bodyweight exercises like squats, push-ups, and lunges. Walking and light cardio are also great!"],
    "prevent injuries": ["Warm up properly, use correct form, and listen to your body! Gradually increase your workout intensity."],
    "how to stay fit while traveling": ["Pack workout gear, choose accommodations with gyms, or use bodyweight exercises. Plan active outings!"],
    "do I need supplements": ["Supplements can help, but focus on whole foods first! Protein powder, fish oil, and multivitamins can be beneficial."],
    "fitness goals": ["Set SMART goals: Specific, Measurable, Achievable, Relevant, and Time-bound. What goals do you have in mind?"],
    "fitness apps": ["Popular fitness apps include MyFitnessPal for tracking food, Strava for running, and Fitbod for workouts."],
    "how to stay motivated": ["Set clear goals, find a workout buddy, and mix up your routine! Celebrate your achievements along the way."],
    "any tips": ["Consistency is key! Remember to listen to your body, stay hydrated, and prioritize rest."],
    "good luck": ["Thank you! You got this! 💪"], 
    
};




// Function to handle user input and respond
function respondToUser(input) {
    const lowerInput = input.toLowerCase();
    for (const key in responses) {
        if (lowerInput.includes(key)) {
            const responseArray = responses[key];
            const randomResponse = responseArray[Math.floor(Math.random() * responseArray.length)];
            return randomResponse;
        }
    }
    return "I'm not sure how to respond to that. Can you ask something else?";
}

// Example usage
console.log(respondToUser("hello"));






   
    // Check for each keyword in the input and respond accordingly
    for (const keyword in responses) {
        if (input.toLowerCase().includes(keyword)) {
            const replies = responses[keyword];
            return replies[Math.floor(Math.random() * replies.length)]; // Return a random response
        }
    }

    // Check for goodbye or bye
    if (input.toLowerCase() === "goodbye" || input.toLowerCase() === "bye") {
        return `Goodbye ${userProfiles[userId].name}! Hope you achieve all your fitness goals!`;
    }

    if (input.toLowerCase().includes("train me")) {
        userProfiles[userId].expectingWeight = true; // Set expecting weight to true
        return "Great! Let's get started. Please tell me your weight (in lbs or kg).";
    }

    if (userProfiles[userId].expectingWeight) {
        // Save weight and ask for height
        const weight = parseFloat(input);
        if (!isNaN(weight)) {
            userProfiles[userId].weight = weight; // Store weight
            userProfiles[userId].expectingWeight = false; // Reset expecting weight
            userProfiles[userId].expectingHeight = true; // Set expecting height to true
            return "Thanks! Now, please provide your height (in cm, m, or feet).";
        } else {
            return "Please enter a valid weight.";
        }
    }

    if (userProfiles[userId].expectingHeight) {
        // Save height and suggest a program
        let height;
        if (input.toLowerCase().includes("cm")) {
            height = parseFloat(input) / 100; // Convert cm to meters
        } else if (input.toLowerCase().includes("m")) {
            height = parseFloat(input); // Already in meters
        } else if (input.toLowerCase().includes("feet")) {
            height = parseFloat(input) * 0.3048; // Convert feet to meters
        } else {
            return "Please specify your height in cm, m, or feet.";
        }
        
        userProfiles[userId].height = height; // Store height
        userProfiles[userId].expectingHeight = false; // Reset expecting height

        // Suggest a program based on weight and height
        return suggestTrainingProgram(userProfiles[userId]);
    }



    // Check for injuries and ask for more details
if (input.toLowerCase().includes("injury")) {
    userProfiles[userId].expectingInjuryDetails = true; // Expecting injury details
    return "I see you're concerned about an injury. Could you please describe your injury? For example, is it a sprain, strain, or something else?";
}

// Handle detailed injury descriptions
if (userProfiles[userId].expectingInjuryDetails) {
    userProfiles[userId].injuries = input; // Store injury details
    userProfiles[userId].expectingInjuryDetails = false; // Reset expecting injury details

    // Respond based on the type of injury mentioned
    if (input.toLowerCase().includes("sprain") || input.toLowerCase().includes("strain")) {
        return "Thank you for sharing. For sprains and strains, I recommend gentle stretching and mobility exercises. Would you like a list of specific exercises you can do?";
    } else if (input.toLowerCase().includes("back") || input.toLowerCase().includes("knee")) {
        return "Thank you for sharing. It's important to focus on strengthening and stretching exercises that don't put too much pressure on your back or knee. Would you like to see some exercises tailored for that?";
    } else if (input.toLowerCase().includes("shoulder")) {
        return "Thank you for sharing. For shoulder injuries, it's best to avoid overhead movements. I can suggest some safe and effective shoulder rehabilitation exercises. Would you like that?";
    } else {
        return "Thank you for sharing. Since I didn't catch the specific type of injury, I can suggest general low-impact exercises like walking, swimming, or cycling. Would you like a list of these?";
    }
}




    // Define fuzzy logic mappings for fitness terms
    const fuzzyMappings = {
        "cardio": ["cardio", "cardi", "cardeo", "caridio", "cardo"],
        "strength": ["strength", "strenght", "strenth", "stength"],
        "nutrition": ["nutrition", "nutriton", "nutrion", "nutrtion"],
        "protein": ["protein", "protin", "proten", "protien"],
        "abs": ["abs", "abbs", "ab", "abs workout"],
        "injury": ["injuri", "injry", "injur"],
        "hydration": ["hydration", "hydrate", "hydrating"],
    };

    // Construct regex patterns for each keyword
    const regexMappings = {};
    for (const keyword in fuzzyMappings) {
        if (fuzzyMappings.hasOwnProperty(keyword)) {
            const variations = fuzzyMappings[keyword];
            const regexPattern = variations.map(variation => `\\b${variation}\\b`).join('|'); 
            regexMappings[keyword] = new RegExp(regexPattern, 'i'); 
        }
    }

    // Check if the input has predefined responses
    const inputLower = input.toLowerCase();

    // Check for greetings
    if (inputLower.includes("hi") || inputLower.includes("hello") || inputLower.includes("ih")) {
        const hiResponses = ["Hello there!", "Hi!", "Hey!"];
        const randomIndex = Math.floor(Math.random() * hiResponses.length);
        
        // Change the image source to smiley3.png when the response is a greeting
        const image = document.querySelector('.small-icon');
        image.src = 'fit Photos/smiley3.png';
        
        return hiResponses[randomIndex];
    }

    // Check if the input matches any predefined responses
    if (responses.hasOwnProperty(inputLower)) {
        const randomIndex = Math.floor(Math.random() * responses[inputLower].length);
        const response = responses[inputLower][randomIndex];

        // Change the image source based on the bot response
        const image = document.querySelector('.small-icon');
        if (response === "Try asking something else!") {
            // Change the source attribute to sad.png
            image.src = 'fit Photos/sad.png';
        } else {
            // Change the source attribute to smiley3.png for any other response
            image.src = 'fit Photos/smiley3.png';
        }

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

        const name = input.slice(nameStartIndex).trim(); // Extract name from input
        userProfiles[userId].name = name; // Update user profile with name
        return `Nice to meet you, ${name}! How can I assist you today?`;
    }

    // Fallback response
    return "I'm not sure how to help with that. Try asking something else!";
}

// Chart rendering function
function displayChart() {
    const ctx = document.getElementById('myChart').getContext('2d');
    document.getElementById('myChart').style.display = 'block'; // Show the chart

    // Example data
    const labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Fitness Progress',
            data: [10, 20, 30, 40], // Replace with actual data
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    new Chart(ctx, {
        type: 'line', // You can change this to 'bar', 'radar', etc.
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Chatbot logic to handle user input
function handleUserInput(userInput) {
    if (userInput.toLowerCase() === "show my fitness progress") {
        displayChart(); // Call your chart rendering function
    } else {
        console.log("Unknown command");
    }
}



function suggestTrainingProgram(userProfile) {
    const weight = userProfile.weight;
    const height = userProfile.height;

    // Suggest training program based on weight and height
    if (weight < 70) {
        return "I suggest a balanced mix of cardio and strength training. Start with 3 days of cardio and 2 days of strength per week.";
    } else if (weight < 90) {
        return "Consider focusing on strength training 4 days a week with a mix of cardio on the other days.";
    } else {
        return "A combination of high-intensity cardio and strength training would be beneficial. Aim for 4-5 workouts a week.";
    }
}




