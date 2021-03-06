                    <section class="item-container" data-id="{{ $app->id }}">
                        <div class="item" style="background-color: {{ $app->colour }}">
                            @if($app->icon)
                            <img class="app-icon" src="{{ asset('storage/'.$app->icon) }}" />
                            @else
                            <i class="fas fa-app-store-ios"></i>
                            @endif
                            <div class="title">{{ $app->title }}</div>
                            
                            <a class="link" href="{{ $app->url }}"><i class="fas fa-arrow-alt-to-right"></i></a>
                        </div>
                        <a class="item-edit" href="{{ route('items.edit', $app->id) }}"><i class="fas fa-pencil"></i></a>
                        
                    </section>
