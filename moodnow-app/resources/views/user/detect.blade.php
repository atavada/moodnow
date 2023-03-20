@section('style')
<style>
  body {
      background: linear-gradient(to bottom, #41228e 50%, white 50%);
  }

  .card-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 80vh;
  overflow: hidden;
  }

  .card {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  width: 60%;
  height: 60%;
  background-color: navy;
  color: lightpink;
  padding: 2rem;
  box-sizing: border-box;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  transition: transform 0.5s;
  z-index: -1;
  border-radius: 10px;
  }

  .card.active {
  transform: translateX(-50%) scale(1.1);
  z-index: 1;
  }

  .card:not(.active) {
  opacity: 0;
  }

  .pagination {
  display: flex;
  justify-content: center;
  margin-top: 2rem;
  }

  .previous,
  .next {
  font-size: 2rem;
  background-color: lightpink;
  color: navy;
  border: none;
  padding: 1rem 2rem;
  margin: 0px 50px 0px 50px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  }

  .previous:hover,.next:hover {
  background-color: navy;
  color: lightpink;
  transform:translateY(-3px);
  box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.325);
  text-shadow: 0 1px 3px rgba(0, 0, 0, 0.325);
  }

  .previous:active,.next:active {
  background-color: rgb(0, 0, 85);
  color: rgb(205, 147, 155);
  transform:translateY(2px);
  }

  /* Hide the previous button on the first card */
  .card.active:first-child ~ .pagination .previous {
  display: none;
  }

  /* Hide the next button on the last card */
  .card.active:last-child ~ .pagination .next {
  display: none;
  }
</style>
@endsection

@extends('layouts.master')

@section('content')

<div class="card-container mt-5">
    <div class="card active mt-5">
      <h2 class="text-white">No 1</h2>
      <p class="text-white">Bagaimana perasaanmu hari ini?</p>
    </div>
    <div class="card">
      <h2 class="text-white">No 2</h2>
      <p class="text-white">Dari skala 1-10, seberapa bahagia kamu hari ini?</p>
    </div>
    <div class="card">
      <h2 class="text-white">No 3</h2>
      <p class="text-white">Apa yang membuatmu senang hari ini?</p>
    </div>
    <div class="card">
      <h2 class="text-white">No 4</h2>
      <p class="text-white">Apakah ada yang membuatmu marah hari ini?</p>
    </div>
  </div>

  <div class="pagination mb-5">
    <button class="previous">&lt;</button>
    <button class="next">&gt;</button>
  </div>

  <script>
    const cards = document.querySelectorAll('.card');
    const previousButton = document.querySelector('.previous');
    const nextButton = document.querySelector('.next');
    let currentCardIndex = 0;

    function showCard(index) {
      // Hide all cards
      cards.forEach(card => {
        card.classList.remove('active');
      });
      // Show the card at the specified index
      cards[index].classList.add('active');
    }

    function showNextCard() {
      currentCardIndex++;
      if (currentCardIndex >= cards.length) {
        currentCardIndex = 0;
      }
      showCard(currentCardIndex);
    }

    function showPreviousCard() {
      currentCardIndex--;
      if (currentCardIndex < 0) {
        currentCardIndex = cards.length - 1;
      }
      showCard(currentCardIndex);
    }

    // Show the first card
    showCard(0);

    // Add event listeners to the pagination buttons
    previousButton.addEventListener('click', showPreviousCard);
    nextButton.addEventListener('click', showNextCard);
  </script>

@endsection 