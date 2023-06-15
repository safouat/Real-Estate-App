<h3 class="card-header text-center">Register User</h3>
    <div class="card-body">
        <form action="{{ route('register.custom') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                    required autofocus>
                
            </div>
            <div class="form-group mb-3">
                <input type="text" placeholder="Email" id="email_address" class="form-control"
                    name="email" required autofocus>
                
            </div>
            <div class="form-group mb-3">
                <input type="password" placeholder="Password" id="password" class="form-control"
                    name="password" required>
                
            </div>
            <div class="form-group mb-3">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember Me</label>
                </div>
            </div>
            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">Sign up</button>
            </div>
        </form>
    </div>
