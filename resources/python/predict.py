import sys
import tensorflow as tf
from tensorflow.keras.preprocessing import image
import numpy as np
import os
import json

try:
    # Carrega o modelo salvo
    model = tf.keras.models.load_model('model.h5')

    # Nome da imagem e diretório da imagem recebidos via argumentos do shell
    image_name = sys.argv[1]
    image_dir = sys.argv[2]

    # Concatena o caminho do diretório com o nome da imagem
    image_path = os.path.join(image_dir, image_name)

    # Carrega e processa a imagem
    img = image.load_img(image_path, target_size=(224, 224))  # Use o tamanho esperado pelo modelo
    img_array = image.img_to_array(img)
    img_array = np.expand_dims(img_array, axis=0)  # Adiciona uma dimensão para o batch

    # Normaliza os pixels para o intervalo [0, 1], se necessário
    img_array /= 255.0

    # Faz a predição
    predictions = model.predict(img_array)

    # Se o modelo retornar probabilidades para cada classe, você pode encontrar a classe mais provável
    predicted_class = np.argmax(predictions, axis=1)

    # Prepara a saída para retornar ao PHP
    result = {
        'predictions': predictions.tolist(),  # Converte o array numpy para lista Python
        'predicted_class': predicted_class.tolist()  # Também converte para lista
    }

    # Imprime o resultado como JSON para o PHP capturar
    print(json.dumps(result))

except Exception as e:
    print(json.dumps({"error": str(e)}))