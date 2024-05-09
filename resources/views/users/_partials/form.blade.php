@csrf
<input type="text" name="name" placeholder="Nome: " value="{{ $user->name ?? old('name') }}" required>
<input type="email" name="email" placeholder="E-mail: " value="{{ $user->email ?? old('name') }}" required>
<input type="password" name="password" placeholder="Senha: " value="">
<button type="submit">Enviar