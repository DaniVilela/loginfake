function startCounter() {
  let count = 5;
  const counterElement = document.getElementById("counter");

  const interval = setInterval(() => {
    counterElement.textContent = count;
    if (count === 0) {
      clearInterval(interval);
      window.location.href =
        "https://www.youtube.com/watch?v=oOtSSrXnHdM&ab_channel=ElMonarcaDeLasSombras";
    }
    count--;
  }, 1000);
}

window.onload = startCounter;
