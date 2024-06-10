<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 - Page Not Found</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .container {
      text-align: center;
    }

    h1 {
      font-size: 5rem;
      margin-bottom: 0.5rem;
    }

    p {
      font-size: 1.5rem;
      margin-bottom: 2rem;
    }

    button {
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius:10px;
      padding: 1rem 2rem;
      font-size: 1.2rem;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>404</h1>
    <p>Oops! The page is Not Found 404.</p>
    <button onclick="window.location.href = '/';">Go to Home</button>
  </div>

  <script>
    // Add a subtle animation to the page
    const container = document.querySelector('.container');
    container.style.opacity = 0;
    container.style.transform = 'translateY(50px)';

    window.addEventListener('load', () => {
      container.style.opacity = 1;
      container.style.transform = 'translateY(0)';
    });
  </script>
</body>
</html>