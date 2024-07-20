<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twilio Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="row">
                    <h1>Send Sms</h1>
                    <div class="row">
                        
                        @if(session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{session()->get('message')}}
                            </div>
                        @endif

                        @if(session()->has('error'))
                          <div class="alert alert-danger" role="alert">
                            {{session()->get('error')}}
                          </div>
                        @endif

                        <form action="{{route('sendSms')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Phone :</label>
                                <input type="text" name="number" class="form-control" id="phoneNumber" placeholder="Phone" required>
                            </div>

                            <div class="form-group">
                                <label>Message</label>
                                <input type="text" name="message" class="form-control" id="message" placeholder="Message" required>
                            </div>

                            <div class="row pt-3 px-2">
                                <button type="submit" class="btn btn-primary">Send SMS</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
</html>