<div class="components-pagination-common-main">
    <div class="components-pagination-common-main__total-container">
        <div class="components-pagination-common-main__total">Всего найдено: {{$data['total']}}</div>
    </div>
    <div class="components-pagination-common-main__main-block">
        <div class="components-pagination-common-main__main-block-item">
            <a
                class="components-pagination-common-main__link {{
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
        <div class="components-pagination-common-main__main-block-item">
            <a
                class="components-pagination-common-main__link {{$data['prev_page_url'] === null ? 'disabled' : ''}}"
                href="{{$data['prev_page_url']}}"
            >
                <
            </a>
        </div>
        <div class="components-pagination-common-main__main-block-item">
            <div class="components-pagination-common-main__current-page">{{$data['current_page']}}</div>
        </div>
        <div class="components-pagination-common-main__main-block-item">
            <a
                class="components-pagination-common-main__link {{$data['next_page_url'] === null ? 'disabled' : ''}}"
                href="{{$data['next_page_url']}}"
            >
                >
            </a>
        </div>
        <div class="components-pagination-common-main__main-block-item">
            <a
                class="components-pagination-common-main__link {{
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


