<li><a href="{{ route('comments.show', $comment->id)  }}">{{ substr($comment->body, 0, 100) }}</a></li>