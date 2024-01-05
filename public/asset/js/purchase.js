function updateInputA0() {
    // Get the value from A0
    const inputA0Value = parseInt(document.getElementById("A0").value) || 0;
  
    // Update the corresponding input values from input0 to input9
    for (let j = 0; j < 10; j++) {
      const inputTopX = document.getElementById("input_top_" + j);
      const otherInput = document.getElementById("input" + j);
  
      if (inputTopX && otherInput) {
        const inputTopXValue = parseInt(inputTopX.value) || 0;
        otherInput.value = inputTopXValue + inputA0Value;
      }
    }
    updateQty();
  }
  
  function updateInputA10() {
    // Get the value from A10
    const inputA10Value = parseInt(document.getElementById("A10").value) || 0;
  
    // Update the corresponding input values from input10 to input19
    for (let k = 10; k < 20; k++) {
      const inputTopX = document.getElementById("input_top_" + (k - 10));
      const otherInput = document.getElementById("input" + k);
  
      if (inputTopX && otherInput) {
        const inputTopXValue = parseInt(inputTopX.value) || 0;
        otherInput.value = inputTopXValue + inputA10Value;
      }
    }
    updateQty();
  }
  
  function updateInputA20() {
    // Get the value from A10
    const inputA10Value = parseInt(document.getElementById("A20").value) || 0;
  
    // Update the corresponding input values from input10 to input19
    for (let k = 20; k < 30; k++) {
      const inputTopX = document.getElementById("input_top_" + (k - 20));
      const otherInput = document.getElementById("input" + k);
  
      if (inputTopX && otherInput) {
        const inputTopXValue = parseInt(inputTopX.value) || 0;
        otherInput.value = inputTopXValue + inputA10Value;
      }
    }
    updateQty();
  }
  
  function updateInputA30() {
    // Get the value from A30
    const inputA30Value = parseInt(document.getElementById("A30").value) || 0;
  
    // Update the corresponding input values from input30 to input39
    for (let k = 30; k < 40; k++) {
      const inputTopX = document.getElementById("input_top_" + (k - 30));
      const otherInput = document.getElementById("input" + k);
  
      if (inputTopX && otherInput) {
        const inputTopXValue = parseInt(inputTopX.value) || 0;
        otherInput.value = inputTopXValue + inputA30Value;
      }
    }
    updateQty();
  }
  
  function updateInputA40() {
    const inputA40Value = parseInt(document.getElementById("A40").value) || 0;
    for (let k = 40; k < 50; k++) {
      const inputTopX = document.getElementById("input_top_" + (k - 40));
      const otherInput = document.getElementById("input" + k);
      if (inputTopX && otherInput) {
        const inputTopXValue = parseInt(inputTopX.value) || 0;
        otherInput.value = inputTopXValue + inputA40Value;
      }
    }
    updateQty();
  }
  
  function updateInputA50() {
    const inputA40Value = parseInt(document.getElementById("A50").value) || 0;
    for (let k = 50; k < 60; k++) {
      const inputTopX = document.getElementById("input_top_" + (k - 50));
      const otherInput = document.getElementById("input" + k);
      if (inputTopX && otherInput) {
        const inputTopXValue = parseInt(inputTopX.value) || 0;
        otherInput.value = inputTopXValue + inputA40Value;
      }
    }
    updateQty();
  }
  
  function updateInputA60() {
    const inputA40Value = parseInt(document.getElementById("A60").value) || 0;
    for (let k = 60; k < 70; k++) {
      const inputTopX = document.getElementById("input_top_" + (k - 60));
      const otherInput = document.getElementById("input" + k);
      if (inputTopX && otherInput) {
        const inputTopXValue = parseInt(inputTopX.value) || 0;
        otherInput.value = inputTopXValue + inputA40Value;
      }
    }
    updateQty();
  }
  
  function updateInputA70() {
    const inputA40Value = parseInt(document.getElementById("A70").value) || 0;
    for (let k = 70; k < 80; k++) {
      const inputTopX = document.getElementById("input_top_" + (k - 70));
      const otherInput = document.getElementById("input" + k);
      if (inputTopX && otherInput) {
        const inputTopXValue = parseInt(inputTopX.value) || 0;
        otherInput.value = inputTopXValue + inputA40Value;
      }
    }
    updateQty();
  }
  
  function updateInputA80() {
    const inputA40Value = parseInt(document.getElementById("A80").value) || 0;
    for (let k = 80; k < 90; k++) {
      const inputTopX = document.getElementById("input_top_" + (k - 80));
      const otherInput = document.getElementById("input" + k);
      if (inputTopX && otherInput) {
        const inputTopXValue = parseInt(inputTopX.value) || 0;
        otherInput.value = inputTopXValue + inputA40Value;
      }
    }
    updateQty();
  }
  
  function updateInputA90() {
    const inputA40Value = parseInt(document.getElementById("A90").value) || 0;
    for (let k = 90; k < 100; k++) {
      const inputTopX = document.getElementById("input_top_" + (k - 90));
      const otherInput = document.getElementById("input" + k);
      if (inputTopX && otherInput) {
        const inputTopXValue = parseInt(inputTopX.value) || 0;
        otherInput.value = inputTopXValue + inputA40Value;
      }
    }
    updateQty();
  }

  




  function updateQty() {
    var sum = 0;
    for (let i = 0; i <= 9; i++) {
      var inputVal = parseInt(document.getElementById("input" + i).value) || 0;
      sum += inputVal;
    }
    document.getElementById("qty9").innerText = sum;
    var pts9Value = sum * 1.1;
    document.getElementById("pts9").innerText = pts9Value.toFixed(2);
  
    var sum = 0;
    var inputVal = 0;
    pts9Value = 0;
    for (let i = 10; i <= 19; i++) {
      var inputVal = parseInt(document.getElementById("input" + i).value) || 0;
      sum += inputVal;
    }
    document.getElementById("qty19").innerText = sum;
    var pts9Value = sum * 1.1;
    document.getElementById("pts19").innerText = pts9Value.toFixed(2);
  
    var sum = 0;
    var inputVal = 0;
    pts9Value = 0;
    for (let i = 20; i <= 29; i++) {
      var inputVal = parseInt(document.getElementById("input" + i).value) || 0;
      sum += inputVal;
    }
    document.getElementById("qty29").innerText = sum;
    var pts9Value = sum * 1.1;
    document.getElementById("pts29").innerText = pts9Value.toFixed(2);
  
    var sum = 0;
    var inputVal = 0;
    pts9Value = 0;
    for (let i = 30; i <= 39; i++) {
      var inputVal = parseInt(document.getElementById("input" + i).value) || 0;
      sum += inputVal;
    }
    document.getElementById("qty39").innerText = sum;
    var pts9Value = sum * 1.1;
    document.getElementById("pts39").innerText = pts9Value.toFixed(2);
  
    var sum = 0;
    var inputVal = 0;
    pts9Value = 0;
    for (let i = 40; i <= 49; i++) {
      var inputVal = parseInt(document.getElementById("input" + i).value) || 0;
      sum += inputVal;
    }
    document.getElementById("qty49").innerText = sum;
    var pts9Value = sum * 1.1;
    document.getElementById("pts49").innerText = pts9Value.toFixed(2);
  
    var sum = 0;
    var inputVal = 0;
    pts9Value = 0;
    for (let i = 50; i <= 59; i++) {
      var inputVal = parseInt(document.getElementById("input" + i).value) || 0;
      sum += inputVal;
    }
    document.getElementById("qty59").innerText = sum;
    var pts9Value = sum * 1.1;
    document.getElementById("pts59").innerText = pts9Value.toFixed(2);
  
    var sum = 0;
    var inputVal = 0;
    pts9Value = 0;
    for (let i = 60; i <= 69; i++) {
      var inputVal = parseInt(document.getElementById("input" + i).value) || 0;
      sum += inputVal;
    }
    document.getElementById("qty69").innerText = sum;
    var pts9Value = sum * 1.1;
    document.getElementById("pts69").innerText = pts9Value.toFixed(2);
  
    var sum = 0;
    var inputVal = 0;
    pts9Value = 0;
    for (let i = 70; i <= 79; i++) {
      var inputVal = parseInt(document.getElementById("input" + i).value) || 0;
      sum += inputVal;
    }
    document.getElementById("qty79").innerText = sum;
    var pts9Value = sum * 1.1;
    document.getElementById("pts79").innerText = pts9Value.toFixed(2);
  
    var sum = 0;
    var inputVal = 0;
    pts9Value = 0;
    for (let i = 80; i <= 89; i++) {
      var inputVal = parseInt(document.getElementById("input" + i).value) || 0;
      sum += inputVal;
    }
    document.getElementById("qty89").innerText = sum;
    var pts9Value = sum * 1.1;
    document.getElementById("pts89").innerText = pts9Value.toFixed(2);
  
    var sum = 0;
    var inputVal = 0;
    pts9Value = 0;
    for (let i = 90; i <= 99; i++) {
      var inputVal = parseInt(document.getElementById("input" + i).value) || 0;
      sum += inputVal;
    }
    document.getElementById("qty99").innerText = sum;
    var pts9Value = sum * 1.1;
    document.getElementById("pts99").innerText = pts9Value.toFixed(2);
  
    updateTotalQty();
  }
  
  function updateTotalQty() {
    var totalQty = 0;
    for (let i = 9; i <= 99; i += 10) {
      var qtyVal = parseInt(document.getElementById("qty" + i).innerText) || 0;
      totalQty += qtyVal;
    }
    document.getElementById("tqty").innerText = totalQty;
    updateTotalPoints(totalQty);
  }
  
  function updateTotalPoints(totalQty) {
    var totalPts = totalQty * 1.1;
    document.getElementById("tpts").innerText = totalPts.toFixed(2);
  }
  
  function allowOnlyNumbers(event) {
    const charCode = event.which ? event.which : event.keyCode;
    if (
      charCode > 31 &&
      (charCode < 48 || charCode > 57) &&
      charCode !== 37 &&
      charCode !== 39
    ) {
      event.preventDefault();
    }
  }

  
  function updateInputs0() {
    // Get the value from input_top_0
    const inputTop0Value =
      parseInt(document.getElementById("input_top_0").value) || 0;
  
    // Update the corresponding input values
    for (let i = 0; i <= 90; i += 10) {
      const correspondingInput = document.getElementById("input" + i);
      const correspondingAInput = document.getElementById("A" + i);
  
      if (correspondingInput && correspondingAInput) {
        const aInputValue = parseInt(correspondingAInput.value) || 0;
        correspondingInput.value = inputTop0Value + aInputValue;
      }
    }
    updateQty();
  }
  
  function updateInputs1() {
    // Get the value from input_top_0
    const inputTop0Value =
      parseInt(document.getElementById("input_top_1").value) || 0;
  
    // Update the corresponding input values
    for (let i = 1; i <= 99; i += 10) {
      const correspondingInput = document.getElementById("input" + i);
      const correspondingAInput = document.getElementById("A" + (i - 1));
  
      if (correspondingInput && correspondingAInput) {
        const aInputValue = parseInt(correspondingAInput.value) || 0;
        correspondingInput.value = inputTop0Value + aInputValue;
      }
    }
    updateQty();
  }
  
  function updateInputs2() {
    // Get the value from input_top_0
    const inputTop0Value =
      parseInt(document.getElementById("input_top_2").value) || 0;
  
    // Update the corresponding input values
    for (let i = 2; i <= 99; i += 10) {
      const correspondingInput = document.getElementById("input" + i);
      const correspondingAInput = document.getElementById("A" + (i - 2));
  
      if (correspondingInput && correspondingAInput) {
        const aInputValue = parseInt(correspondingAInput.value) || 0;
        correspondingInput.value = inputTop0Value + aInputValue;
      }
    }
    updateQty();
  }
  
  function updateInputs3() {
    // Get the value from input_top_0
    const inputTop0Value =
      parseInt(document.getElementById("input_top_3").value) || 0;
  
    // Update the corresponding input values
    for (let i = 3; i <= 99; i += 10) {
      const correspondingInput = document.getElementById("input" + i);
      const correspondingAInput = document.getElementById("A" + (i - 3));
  
      if (correspondingInput && correspondingAInput) {
        const aInputValue = parseInt(correspondingAInput.value) || 0;
        correspondingInput.value = inputTop0Value + aInputValue;
      }
    }
    updateQty();
  }
  
  function updateInputs4() {
    // Get the value from input_top_0
    const inputTop0Value =
      parseInt(document.getElementById("input_top_4").value) || 0;
  
    // Update the corresponding input values
    for (let i = 4; i <= 99; i += 10) {
      const correspondingInput = document.getElementById("input" + i);
      const correspondingAInput = document.getElementById("A" + (i - 4));
  
      if (correspondingInput && correspondingAInput) {
        const aInputValue = parseInt(correspondingAInput.value) || 0;
        correspondingInput.value = inputTop0Value + aInputValue;
      }
    }
    updateQty();
  }
  
  function updateInputs5() {
    // Get the value from input_top_0
    const inputTop0Value =
      parseInt(document.getElementById("input_top_5").value) || 0;
  
    // Update the corresponding input values
    for (let i = 5; i <= 99; i += 10) {
      const correspondingInput = document.getElementById("input" + i);
      const correspondingAInput = document.getElementById("A" + (i - 5));
  
      if (correspondingInput && correspondingAInput) {
        const aInputValue = parseInt(correspondingAInput.value) || 0;
        correspondingInput.value = inputTop0Value + aInputValue;
      }
    }
    updateQty();
  }
  
  function updateInputs6() {
    // Get the value from input_top_0
    const inputTop0Value =
      parseInt(document.getElementById("input_top_6").value) || 0;
  
    // Update the corresponding input values
    for (let i = 6; i <= 99; i += 10) {
      const correspondingInput = document.getElementById("input" + i);
      const correspondingAInput = document.getElementById("A" + (i - 6));
  
      if (correspondingInput && correspondingAInput) {
        const aInputValue = parseInt(correspondingAInput.value) || 0;
        correspondingInput.value = inputTop0Value + aInputValue;
      }
    }
    updateQty();
  }
  
  function updateInputs7() {
    // Get the value from input_top_0
    const inputTop0Value =
      parseInt(document.getElementById("input_top_7").value) || 0;
  
    // Update the corresponding input values
    for (let i = 7; i <= 99; i += 10) {
      const correspondingInput = document.getElementById("input" + i);
      const correspondingAInput = document.getElementById("A" + (i - 7));
  
      if (correspondingInput && correspondingAInput) {
        const aInputValue = parseInt(correspondingAInput.value) || 0;
        correspondingInput.value = inputTop0Value + aInputValue;
      }
    }
    updateQty();
  }
  
  function updateInputs8() {
    // Get the value from input_top_0
    const inputTop0Value =
      parseInt(document.getElementById("input_top_8").value) || 0;
  
    // Update the corresponding input values
    for (let i = 8; i <= 99; i += 10) {
      const correspondingInput = document.getElementById("input" + i);
      const correspondingAInput = document.getElementById("A" + (i - 8));
  
      if (correspondingInput && correspondingAInput) {
        const aInputValue = parseInt(correspondingAInput.value) || 0;
        correspondingInput.value = inputTop0Value + aInputValue;
      }
    }
    updateQty();
  }
  
  function updateInputs9() {
    // Get the value from input_top_0
    const inputTop0Value =
      parseInt(document.getElementById("input_top_9").value) || 0;
  
    // Update the corresponding input values
    for (let i = 9; i <= 99; i += 10) {
      const correspondingInput = document.getElementById("input" + i);
      const correspondingAInput = document.getElementById("A" + (i - 9));
  
      if (correspondingInput && correspondingAInput) {
        const aInputValue = parseInt(correspondingAInput.value) || 0;
        correspondingInput.value = inputTop0Value + aInputValue;
      }
    }
    updateQty();
  }
  



function allowOnlyNumbers(event) {
  const charCode = (event.which) ? event.which : event.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 37 && charCode !== 39) {
      event.preventDefault();
  }
}