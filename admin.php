<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vieraskirja - Ylläpito</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Vieraskirja - Ylläpito</h2>
        
        <form id="messageForm">
            <div class="mb-3">
                <label class="form-label">Nimi:</label>
                <input type="text" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Viesti:</label>
                <textarea id="message" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Lähetä</button>
        </form>

        <hr>

        <h3>Viestejä</h3>
        <div id="messages"></div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function loadMessages() {
            $.get('get_messages.php', function(data) {
                $('#messages').html(data);
            });
        }

        $(document).ready(function() {
            loadMessages();

            $('#messageForm').submit(function(e) {
                e.preventDefault();


                $.post('post_message.php', {
                    name: $('#name').val(),
                    message: $('#message').val()
                }, function() {
                    loadMessages();
                    $('#messageForm')[0].reset();
                });
            });
        });
    </script>
</body>
</html>
