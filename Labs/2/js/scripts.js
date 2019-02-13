      $("document").ready( function()
      {
        $("#reset").css("color","red");
        $(".guessSubmit").css("font-weight", "bold");
        $("#diretions").css("font-size"), "2.3em";
        $("#directions").css("font-weight", "bold");
        $(".guessField").css("font-weight", "normal");
        $(".jumbotron").css("font-weight", "bold");
        
      })
      
      
      // Your JavaScript goes here
      var randomNumber = Math.floor(Math.random() * 99) + 1;
      var guesses = document.querySelector('#guesses');
      var error = document.querySelector('#error');
      var lastResult = document.querySelector('#lastResult');
      var lowOrHi = document.querySelector('#lowOrHi');
      var guessLeft = document.querySelector('#remaining');
      var guessSubmit = document.querySelector('.guessSubmit');
      var guessField = document.querySelector('.guessField');
    
      var guessCount = 1;
      var resetButton = document.querySelector('#reset');
      resetButton.style.display = 'none';
      guessField.focus();
      
      function checkGuess() {
            var userGuess = Number(guessField.value);
            if(userGuess > 99 || userGuess < 1)
            {
                error.innerHTML = "Wrong input detected, only a number between 1-99 can be submitted.";
                return;
            }
            else if(userGuess.toString() == "NaN")
            {
              error.innerHTML = "Wrong input detected, please enter only a number";
              return;
            }
            if (guessCount === 1) {
                guesses.innerHTML = 'Your previous guesses were: ';
            }
            guesses.innerHTML += userGuess + ',  ';
            guessLeft.innerHTML = 'You have ' + (7-guessCount) + ' guesses left!';
              if (userGuess === randomNumber) {
                error.innerHTML = ' ';
                lastResult.innerHTML = 'Congratulations! You got it right!';
                lastResult.style.backgroundColor = 'green';
                lowOrHi.innerHTML = '';
                guessLeft.innerHTML = 'You had only ' + (7-guessCount) + ' guesses left!';
                setGameOver();
              } else if (guessCount === 7) {
                error.innerHTML = ' ';
                lastResult.innerHTML = 'GAME OVER! Better luck next time...';
                guessLeft.innerHTML = ' ';
                lowOrHi.innerHTML = '';
                setGameOver();
              } else {
                error.innerHTML = " ";
                lastResult.innerHTML = 'You guessed wrong!';
                lastResult.style.backgroundColor = 'red';
                lastResult.style.height = '50px';
                if(userGuess < randomNumber) {
                  lowOrHi.innerHTML = 'Your last guess was too low!';
                } else if(userGuess > randomNumber) {
                  lowOrHi.innerHTML = 'Your last guess was too high!';
                }
              }
             
              guessCount++;
              guessField.value = '';
              guessField.focus();
      }
      
      guessSubmit.addEventListener('click', checkGuess);
      
      function setGameOver() {
        guessField.disabled = true;
        guessSubmit.disabled = true;
        resetButton.style.display = 'inline';
        resetButton.addEventListener('click', resetGame);
      }
      
      function resetGame() {
        guessCount = 1;
      
        var resetParas = document.querySelectorAll('.resultParas p');
        for (var i = 0 ; i < resetParas.length ; i++) {
          resetParas[i].textContent = '';
        }
      
        resetButton.style.display = 'none';
      
        guessField.disabled = false;
        guessSubmit.disabled = false;
        guessField.value = '';
        guessField.focus();
      
        lastResult.style.backgroundColor = '#edf2f9';
      
        randomNumber = Math.floor(Math.random() * 99) + 1;
      }