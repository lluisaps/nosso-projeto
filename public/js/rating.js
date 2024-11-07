document.addEventListener('DOMContentLoaded', function () {
    const starButtons = document.querySelectorAll('.star-btn');
    const submitButton = document.getElementById('submit-rating');
    let selectedRating = 0;

    // Seleção de Estrelas
    starButtons.forEach(button => {
        button.addEventListener('click', function () {
            selectedRating = parseInt(this.getAttribute('data-rating'));
            updateStarSelection(selectedRating);
        });
    });

    // Função para Atualizar a Seleção de Estrelas
    function updateStarSelection(rating) {
        starButtons.forEach((button, index) => {
            button.classList.toggle('selected', index < rating);
        });
    }

    // Envio da Avaliação
    submitButton.addEventListener('click', function () {
        if (selectedRating > 0) {
            // Exibir caixa de agradecimento
            document.querySelector('.box').style.display = 'none';
            document.querySelector('.thanks-box').style.display = 'block';

            // Salvar avaliação no banco de dados via AJAX
            fetch('/salvar-avaliacao', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ rating: selectedRating })
            }).then(response => response.json())
              .then(data => {
                console.log('Avaliação salva com sucesso:', data);
            }).catch(error => {
                console.error('Erro ao salvar avaliação:', error);
            });
        } else {
            alert('Por favor, selecione uma avaliação antes de enviar.');
        }
    });
});
