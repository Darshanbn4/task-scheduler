document.addEventListener("DOMContentLoaded", function() {
    const table = document.getElementById("taskTable");
    const addRowButton = document.getElementById("addRow");
    let rowCount = 0;

    addRowButton.addEventListener("click", function() {
        rowCount++;
        const newRow = table.insertRow();

        const slNoCell = newRow.insertCell(0);
        slNoCell.textContent = rowCount;

        const crNoCell = newRow.insertCell(1);
        crNoCell.textContent = generateCRNo(); // Implement your CR number generator

        const taskNoCell = newRow.insertCell(2);
        taskNoCell.textContent = generateTaskNo(); // Implement your task number generator

        const dueDateCell = newRow.insertCell(3);
        const dueDateInput = document.createElement("input");
        dueDateInput.type = "date";
        dueDateCell.appendChild(dueDateInput);

        const presentDateCell = newRow.insertCell(4);
        presentDateCell.textContent = getCurrentDate();

        const personNameCell = newRow.insertCell(5);
        const personNameInput = document.createElement("input");
        personNameInput.type = "text";
        personNameCell.appendChild(personNameInput);

        const emailCell = newRow.insertCell(6);
        const emailInput = document.createElement("input");
        emailInput.type = "email";
        emailCell.appendChild(emailInput);

        const phoneCell = newRow.insertCell(7);
        const phoneInput = document.createElement("input");
        phoneInput.type = "tel";
        phoneCell.appendChild(phoneInput);

        const sendMailCell = newRow.insertCell(8);
        const sendMailButton = document.createElement("button");
        sendMailButton.textContent = "Send and Check Mail";


        sendMailButton.addEventListener("click", function() {
            const dueDateValue = dueDateInput.value;

            // Parse the due date value to a Date object
            const dueDate = new Date(dueDateValue);

            // Get the current date
            const currentDate = new Date();

            if (dueDate < currentDate) {
                // Build the URL for the send.php file, passing the email as a query parameter
                //const url = 'send.php?email=' + encodeURIComponent(emailInput.value);


                // Create a URL with the encoded variables
                var encodedVariable1 = encodeURIComponent(slNoCell.value);
                var encodedVariable2 = encodeURIComponent(ceNoCell.value);
                var encodedVariable3 = encodeURIComponent(tasNoCell.value);
                var encodedemail = encodeURIComponent(emailInput.value)


                const url = 'store.php?email=' + encodedemail +
                    "var1 = " + encodedVariable1 +
                    "&var2=" + encodedVariable2 +
                    "&var3=" + encodedVariable3;
                xhr.open("GET", url, true);

                // Send the request
                xhr.send();



                // Open the URL in a new tab/window
                window.open(url, '_blank');
                fetch();
                sendData();

            } else {
                alert("Due date has not exceeded the present date. Cannot send email.");
            }
        });

        sendMailCell.appendChild(sendMailButton);
    });
});
fetch("send.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8"
        },
        body: JSON.stringify(user)
    })
    .then(function(response) {
        return response.text();
    })
    .then(function(data) {
        console.log(data); // Handle the response as needed
        setTimeout(function() {
            // Your desired action after 10 seconds
        }, 10000);
    })
    .catch(function(error) {
        console.error("Error:", error);
    });

function generateCRNo() {
    const minCRNo = 1000;
    const maxCRNo = 9999;
    return Math.floor(Math.random() * (maxCRNo - minCRNo + 1)) + minCRNo

}

function generateTaskNo() {

    // Implement your task number generator logic here
    // Get the task number input from the user
    const userInput = prompt("Enter a task number:");

    // Validate the user input (optional)
    if (userInput === null || userInput === "") {
        return "N/A"; // Return a placeholder value or handle the invalid input as needed
    }

    return userInput; // Return the user-provided task number


}

function getCurrentDate() {
    const today = new Date();
    const year = today.getFullYear();
    let month = today.getMonth() + 1;
    let day = today.getDate();

    if (month < 10) {
        month = "0" + month;
    }

    if (day < 10) {
        day = "0" + day;
    }

    return year + "-" + month + "-" + day;
}
const user = {
    slNo: rowCount,
    crNo: crNoCell.textContent,
    taskNo: taskNoCell.textContent,
    dueDate: dueDateValue,
    personName: personNameInput.value,
    email: emailInput.value,
    phone: phoneInput.value
};

fetch("store.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8"
        },
        body: JSON.stringify(user)
    })
    .then(function(response) {
        return response.text();
    })
    .then(function(data) {
        console.log(data); // Handle the response as needed
        setTimeout(function() {
            // Your desired action after 10 seconds
        }, 10000);
    })
    .catch(function(error) {
        console.error("Error:", error);
    });

function sendData() {
    var data = {
        name: slNoCell,
        email: crNoCell,
    };
    //👇 call the fetch function
    fetch("store.php", {
            method: "POST",
            body: JSON.stringify(data),
            headers: {
                "Content-Type": "application/json",
            },
        })
        //👇 receive the response
        .then((response) => response.text())
        .then((data) => alert(data));
}