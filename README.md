# API Gateway

> Atividade de pós-graduação.

## Instalações

1. Instale o [Composer](https://getcomposer.org/)
2. Instale o [Slim Framework](http://www.slimframework.com/)

## Executando o aplicativo

Serão necessárias várias instâncias do terminal para executar o aplicativo.

**Terminal 01**: Na raiz do projeto execute o comando:

```
php -S localhost:8080
```

**Terminal 02**: No diretório 'service-validar' execute o comando:

```
php -S localhost:8081
```

**Terminal 03**: No diretório 'service-somar' execute o comando:

```
php -S localhost:8082
```

**Terminal 04**: No diretório 'service-subtrair' execute o comando:

```
php -S localhost:8083
```

**Terminal 05**: No diretório 'service-multiplicar' execute o comando:

```
php -S localhost:8084
```

**Terminal 06**: No diretório 'service-dividir' execute o comando:

```
php -S localhost:8085
```

## Exemplos de uso

Utilize o aplicativo [Insomnia](https://insomnia.rest/download/) ou [Postman](https://www.postman.com/downloads/) para realizar as requisições POST:

| Função      | URL                                                     |
|-------------|---------------------------------------------------------|
| Somar       | http://localhost:8080/api-gateway/somar/resultado       |
| Subtrair    | http://localhost:8080/api-gateway/subtrair/resultado    |
| Multiplicar | http://localhost:8080/api-gateway/multiplicar/resultado |
| Dividir     | http://localhost:8080/api-gateway/dividir/resultado     |

###### Entradas

Os valores de entrada para realização dos cálculos dever ser informados no Body dos aplicativos seguindo a estrutura abaixo:

```json
{
    "valorA": "50",
    "valorB": "10"
}
```

Nota: Os valores podem ser alterados.

###### Saídas

Para a entrada acima utilizada como exemplo temos as seguintes saídas de acordo com a função que utilizar:

```json
{
    "resultado da soma": "60"
}

{
    "resultado da subtração": "40"
}

{
    "resultado da multiplicação": "500"
}

{
    "resultado da divisão": "5"
}
```

Mensagens de erros:

```json
{
    "erro": "Um ou mais valores estão vazios ou não são numéricos!"
}

{
    "erro": "Não é possível realizar esta divisão!"
}
```

## Informações da Pós-Graduação

- Instituição: Faculdade Paraíso do Ceará
- Pós-Graduação: Desenvolvimento Web
- Disciplina: Serviços Web (Mód. 14)
- Data: 30 e 31 de maio de 2020
- Professor: [Paulo Weverton](https://github.com/pauloweverton)