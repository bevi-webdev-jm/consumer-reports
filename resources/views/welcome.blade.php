<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumer Safety Reporting</title>
    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.12);
            --glass-border: rgba(255, 255, 255, 0.25);
            --btn-glass: rgba(255, 255, 255, 0.1);
            --apple-font: -apple-system, BlinkMacSystemFont, "SF Pro Display", "SF Pro Text", "Helvetica Neue", sans-serif;
        }

        * {
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: var(--apple-font);
            /* Remove overflow: hidden from here */
            background-color: #000000;
            padding: 40px 20px; /* Ensures card doesn't touch screen edges on mobile */
        }

        /* Animated Mesh Background */
        .bg-mesh {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            background: #ffffff;
            overflow: hidden; /* Move the hidden overflow here */
        }

        .blob {
            position: absolute;
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #ea6666 0%, #a24b4b 100%);
            filter: blur(80px);
            border-radius: 50%;
            opacity: 0.6;
            animation: move 20s infinite alternate;
        }

        .blob-2 {
            background: linear-gradient(135deg, #ea6666 0%, #a24b4b 100%);
            right: -100px;
            top: -100px;
            animation-delay: -5s;
        }

        @keyframes move {
            from { transform: translate(-10%, -10%) scale(1); }
            to { transform: translate(20%, 20%) scale(1.2); }
        }

        /* The Card */
        .glass-card {
            max-width: 900px;
            width: 90%;
            padding: 3.5rem;
            border-radius: 32px;
            color: rgb(0, 0, 0);
            background: var(--glass-bg);
            backdrop-filter: blur(25px) saturate(200%);
            -webkit-backdrop-filter: blur(25px) saturate(200%);
            border: 1px solid var(--glass-border);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            margin-left: auto;
            margin-right: auto;
        }

        /* Media Query for smaller screens */
        @media (max-width: 480px) {
            .glass-card {
                padding: 2rem; /* Reduce padding so text has more room */
                border-radius: 24px;
                text-align: center;
            }

            h1 {
                font-size: 1.8rem;
            }

            .blob {
                width: 50px;
                height: 50px;
            }

            .blob-2 {
                right: -100px;
                top: 500px;
                animation-delay: -5s;
            }
        }

        .glass-card:hover {
            transform: translateY(-5px);
            border-color: rgba(255, 255, 255, 0.4);
            background: rgba(255, 255, 255, 0.15);
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0 0 1.5rem 0;
            letter-spacing: -0.03em;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: rgba(0, 0, 0, 0.85);
            margin-bottom: 1.5rem;
        }

        /* THE GLASS BUTTON */
        .btn-glass {
            display: inline-block;
            margin-top: 1rem;
            padding: 14px 28px;
            background: var(--btn-glass);
            color: #000000;
            text-decoration: none;
            border-radius: 16px;
            font-weight: 600;
            font-size: 1rem;

            /* Glass properties for the button */
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);

            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-glass:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            transform: scale(1.03);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-glass:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>

    <div class="bg-mesh">
        <div class="blob"></div>
        <div class="blob blob-2"></div>
    </div>

    <livewire:form.form />

</body>
</html>
