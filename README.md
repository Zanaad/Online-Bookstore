# Online Bookstore

A PHP + MySQL online bookstore, packaged with Docker Compose for easy local runs.

## Prerequisites

- Docker
- Docker Compose

## Quick Start

1. Clone the repo and move into it:

   ```bash
   git clone git@github.com:Zanaad/Online-Bookstore.git
   cd Online-Bookstore
   ```

2. Copy the provided `.env.example` to `.env` and adjust values if needed (required for MySQL):

   ```bash
   cp .env.example .env
   ```

3. Build and start the stack:

   ```bash
   docker compose up --build -d
   ```

4. Open the app:
   - Storefront: http://localhost:8000
   - phpMyAdmin: http://localhost:8080

## Stopping the Stack

```bash
docker compose down
```
