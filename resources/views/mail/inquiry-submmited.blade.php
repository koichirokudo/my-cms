<p>新しいお問い合わせが届きました。</p>
<ul>
  <li>お名前: {{ $inquiry->name }}</li>
  <li>Email: {{ $inquiry->email }}</li>
</ul>
<p>内容:</p>
<pre>{{ $inquiry->message }}</pre>

