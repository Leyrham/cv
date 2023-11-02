#importe os + biblio openia
import os
import openai

#def clé avec var open ia
openai.api_key = os.getenv("OPENAI_API_KEY")

#boucle while marche tant que user ne tape pas exit.
while True:
  question = input("\033[34mQuelle est votre question ?\n\033[0m")
  #pose la question , code couleur au debut = bleu

  if question.lower() == "exit":
    print("\033[31mAu revoir !\033[0m")
    break
  #verifie si exit est bien tapé et met au revoir en rouge

  completion = openai.ChatCompletion.create(
      model="gpt-3.5-turbo",
      messages=[
          {
              "role":
              "system",
              "content":
              "Vous êtes un assistant utile. Répondez à la question donnée."
          },  #message au système
          {
              "role": "user",
              "content": question
          }
      ]  #utilise entrée utilisateur pour repondre a la question
  )

  print("\033[32m" + completion.choices[0].message.content + "\n")
