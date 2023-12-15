<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>

    <h1>Calculator</h1>

    <form id="calculatorForm">
        <label for="operation">Operation:</label>
        <select id="operation" name="operation">
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
        </select>

        <br>

        <label for="num1">Number 1:</label>
        <input type="number" id="num1" name="num1" required>

        <br>

        <label for="num2">Number 2:</label>
        <input type="number" id="num2" name="num2" required>

        <br>

        <button type="button" onclick="calculate()">Calculate</button>
    </form>

    <h2>Result:</h2>
    <p id="result">Waiting for calculation...</p>

    <script>
        function calculate() {
            var operation = document.getElementById("operation").value;
            var num1 = parseFloat(document.getElementById("num1").value);
            var num2 = parseFloat(document.getElementById("num2").value);

            // Check karein ki numbers valid hain ya nahi
            if (isNaN(num1) || isNaN(num2)) {
                document.getElementById("result").innerText = 'Invalid input. Please enter valid numbers.';
            } else {
                // Calculator function ka use karein
                var result = calculator(operation, num1, num2);
                document.getElementById("result").innerText = 'Result: ' + result;
            }
        }

        function calculator(operation, num1, num2) {
            switch (operation) {
                case 'add':
                    return num1 + num2;
                case 'subtract':
                    return num1 - num2;
                case 'multiply':
                    return num1 * num2;
                case 'divide':
                    // Check karein ki denominator zero to nahi hai
                    if (num2 !== 0) {
                        return num1 / num2;
                    } else {
                        return 'Error: Divide by zero!';
                    }
                default:
                    return 'Invalid operation';
            }
        }
    </script>

</body>
</html>
