<div class="pagination">
    <div class="pagination__total-container">
        <div class="pagination__total">Всего найдено: {{$data['total']}}</div>
    </div>
    <div class="pagination__main-block">
        <div class="pagination__main-block-item">
            <a
                class="pagination__link {{
                    $data['first_page_url'] === null ||
                    $data['current_page'] === 1 ?
                    'disabled' :
                    ''
                }}"
                href="{{$data['first_page_url']}}"
            >
                <<
            </a>
        </div>
        <div class="pagination__main-block-item">
            <a
                class="pagination__link {{$data['prev_page_url'] === null ? 'disabled' : ''}}"
                href="{{$data['prev_page_url']}}"
            >
                <
            </a>
        </div>
        <div class="pagination__main-block-item">
            {{$data['current_page']}}
        </div>
        <div class="pagination__main-block-item">
            <a
                class="pagination__link {{$data['next_page_url'] === null ? 'disabled' : ''}}"
                href="{{$data['next_page_url']}}"
            >
                >
            </a>
        </div>
        <div class="pagination__main-block-item">
            <a
                class="pagination__link {{
                    $data['last_page_url'] === null ||
                    $data['current_page'] === $data['total'] ?
                    'disabled' :
                    ''
                }}"
                href="{{$data['last_page_url']}}"
            >
                >>
            </a>
        </div>
    </div>
</div>


