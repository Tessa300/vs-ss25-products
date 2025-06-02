<div class="centered-container">
    <div class="card">
        <h2>Login</h2>
        <form id="login-form" action="<?=site_url('auth/login')?>" method="post">
            <label>Username:
                <input type="text" name="username" required>
            </label>
            <label>Password:
                <input type="password" name="password" required>
            </label>
            <button type="submit">Login</button>
        </form>
    </div>
</div>