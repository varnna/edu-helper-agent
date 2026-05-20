# EduHelperAgent

EduHelperAgent is a simple AI-powered educational chatbot built using Laravel and LarAgent.
The chatbot helps school students learn basic topics in a friendly and simple way.

---

# Features

* AI chatbot using Laravel
* Supports:

  * Solar System
  * Fractions
  * Water Cycle
* Polite responses
* Maximum 60-word replies
* Conversation memory using session
* Restricts unsupported topics

---

# Technologies Used

* Laravel 13
* LarAgent
* Groq API (Free LLM Provider)
* PHP
* Blade Template Engine

---

# Project Structure

app/
├── AiAgents/
│ └── EduHelperAgent.php
│
├── Http/
│ └── Controllers/
│ └── ChatController.php

resources/
└── views/
└── chat_box/
└── chat.blade.php

routes/
└── web.php

public/
└── images/
└── robot.jpg

---

# Installation Steps

## Step 1 — Clone Repository

git clone https://github.com/varnna/edu-helper-agent.git

---

## Step 2 — Open Project Folder

cd edu-helper-agent

---

## Step 3 — Install Dependencies

composer install

---

## Step 4 — Create Environment File

copy .env.example .env

---

## Step 5 — Generate Application Key

php artisan key:generate

---

# API Setup

This project uses Groq as the free LLM provider.

## Step 1 — Create Groq Account

Visit:

https://console.groq.com

Login using Google or GitHub account.

---

## Step 2 — Generate API Key

Open:

https://console.groq.com/keys

Click:

Create API Key

Copy the generated API key.

---

## Step 3 — Configure `.env`

Open `.env` file and add:

OPENAI_API_KEY=your_groq_api_key

OPENAI_BASE_URL=https://api.groq.com/openai/v1

---

## Step 4 — Clear Cache

Run:

php artisan optimize:clear


---

# Running the Project

Start Laravel server:

php artisan serve

Open browser:

http://127.0.0.1:8000

---

# How EduHelperAgent Works

1. Student enters a question in the chat interface.
2. ChatController receives the message.
3. Message is sent to EduHelperAgent.
4. EduHelperAgent sends request to Groq AI model.
5. AI generates response based on system instructions.
6. Laravel displays response in chatbot UI.

---

# Conversation Memory

Laravel session is used to store previous chat messages.

This allows the chatbot to remember earlier conversation during the session.

---

# Supported Topics

* Solar System
* Fractions
* Water Cycle

If user asks another topic, the chatbot replies:

"I can only help with Solar System, Fractions, or Water Cycle for now."

---


# Author

Shinly p
