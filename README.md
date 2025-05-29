# 🏥 Hospital Integration API

API RESTful para gerenciamento de pacientes utilizando **Laravel 12** + **Sanctum**.

---

## 🚀 Funcionalidades

- 🔐 Autenticação com Sanctum (token)
- 📋 CRUD completo para pacientes
- 🔒 Rotas protegidas com `auth:sanctum`
- 🧪 Pronta para integração com Postman ou frontend

---

## ⚙️ Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/your-user/hospital-integration-api.git
cd hospital-integration-api
```

### 2. Instale as dependências

```bash
composer install
cp .env.example .env
php artisan key:generate
```

### 3. Configure o `.env` e execute as migrations

```bash
php artisan migrate
php artisan db:seed
```

---

## 🔐 Autenticação

### Login

**Endpoint**:  
`POST /api/login`

**Body**:

```json
{
  "email": "admin@hospital.com",
  "password": "12345678"
}
```

**Resposta**:

```json
{
  "token": "your_token_here",
  "user": {
    "id": 1,
    "email": "admin@hospital.com",
    ...
  }
}
```

---

## 📡 Rotas protegidas (usar Bearer Token)

| Método | Endpoint               | Descrição          |
|--------|------------------------|--------------------|
| GET    | /api/patients          | Listar pacientes   |
| POST   | /api/patients          | Criar paciente     |
| GET    | /api/patients/{id}     | Obter paciente     |
| PUT    | /api/patients/{id}     | Atualizar paciente |
| DELETE | /api/patients/{id}     | Deletar paciente   |

---

## 🧑‍💻 Cabeçalhos de exemplo

```http
Authorization: Bearer your_token_here
Accept: application/json
```

---

## 🧰 Stack Utilizada

- Laravel 12
- Sanctum
- MySQL / MariaDB
- API Token-Based

---

## 👤 Usuário padrão

```txt
Email:    admin@hospital.com
Senha:    12345678
```

---

## ✅ Próximos passos

- Adicionar documentação Swagger/OpenAPI
- Criar módulos: médicos, agendamentos, relatórios
- Adicionar testes automatizados e CI pipeline


---

## 👤 Author

**Marcos Paulo Bez Birolo**  
Full Stack Developer  
[marcos.birolo@unimedjau.com.br](mailto:rockbez@hotmail.com)
