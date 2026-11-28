@extends('layouts.admin', [
    'title' => 'Adminpage - Country',
    'headerTitle' => 'Country',
    'headerSubtitle' => 'Master data negara',
    'breadcrumb' => 'Country',
    'headerIcon' => 'pe-7s-map-2',
])

@push('css')
    <link href="{{ asset('assets/plugins/footable-bootstrap/css/footable.core.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4 id="md-form-title">Tambah Country</h4>
                </div>
            </div>
            <div class="panel-body">
                <div id="md-form-alert" class="alert alert-danger" style="display:none;"></div>

                <form id="md-form">
                    <input type="hidden" id="md-id" value="">

                    <div class="form-group row">
                        <label for="md-code" class="col-sm-4 col-form-label">Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="md-code" placeholder="Kode negara" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="md-name" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="md-name" placeholder="Nama negara" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8 col-sm-offset-4">
                            <label class="form-check-label">
                                <input type="checkbox" id="md-is-active" checked> Aktif
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" id="md-submit">Simpan</button>
                    <button type="button" class="btn btn-default" id="md-cancel" style="display:none;">Batal Edit</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Daftar Country</h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <input type="text" class="form-control input-sm m-b-15" id="md-filter" placeholder="Cari di halaman ini">
                    <table id="md-table" class="footable table table-bordered toggle-arrow-tiny" data-filter="#md-filter">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th data-hide="all">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="md-table-body">
                            <tr><td colspan="5">Memuat data...</td></tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination pull-right" id="md-pagination"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/footable-bootstrap/js/footable.all.min.js') }}"></script>
    <script>
        (function ($) {
            'use strict';

            var API_RESOURCE = '/countries';
            var API_BASE = '/api/v1';
            var MEDIA_TYPE = 'application/vnd.api+json';
            var PAGE_SIZE = 10;
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var state = { page: 1, totalPages: 1, editingId: null };

            function apiHeaders(extra) {
                return $.extend({
                    'Content-Type': MEDIA_TYPE,
                    'Accept': MEDIA_TYPE,
                    'X-CSRF-TOKEN': csrfToken,
                }, extra || {});
            }

            function apiRequest(method, url, body) {
                return $.ajax({
                    method: method,
                    url: API_BASE + url,
                    headers: apiHeaders(),
                    data: body ? JSON.stringify(body) : undefined,
                    xhrFields: { withCredentials: true },
                }).then(
                    function (data) { return { ok: true, data: data }; },
                    function (xhr) { return { ok: false, status: xhr.status, data: xhr.responseJSON }; }
                );
            }

            function showFormError(message) {
                $('#md-form-alert').text(message).show();
            }

            function hideFormError() {
                $('#md-form-alert').hide().text('');
            }

            function resetForm() {
                state.editingId = null;
                $('#md-form')[0].reset();
                $('#md-id').val('');
                $('#md-form-title').text('Tambah Country');
                $('#md-submit').text('Simpan');
                $('#md-cancel').hide();
                hideFormError();
            }

            function statusBadge(isActive) {
                return isActive
                    ? '<span class="label label-success">Aktif</span>'
                    : '<span class="label label-default">Nonaktif</span>';
            }

            function renderRows(items) {
                var $body = $('#md-table-body').empty();

                if (items.length === 0) {
                    $body.append('<tr><td colspan="5">Belum ada data.</td></tr>');

                    return;
                }

                items.forEach(function (resource) {
                    var attrs = resource.attributes;
                    var toggleLabel = attrs.is_active ? 'Nonaktifkan' : 'Aktifkan';
                    var toggleAction = attrs.is_active ? 'deactivate' : 'activate';

                    var $row = $('<tr>');
                    $row.append($('<td>').text(resource.id));
                    $row.append($('<td>').text(attrs.name));
                    $row.append($('<td>').text(attrs.code));
                    $row.append($('<td>').html(statusBadge(attrs.is_active)));
                    $row.append(
                        $('<td>').append(
                            $('<button>').addClass('btn btn-xs btn-info m-r-5').text('Edit')
                                .on('click', function () { editRow(resource.id); }),
                            $('<button>').addClass('btn btn-xs btn-warning').text(toggleLabel)
                                .on('click', function () { toggleActive(resource.id, toggleAction); })
                        )
                    );

                    $body.append($row);
                });
            }

            function renderPagination(total) {
                state.totalPages = Math.max(Math.ceil(total / PAGE_SIZE), 1);

                var $pagination = $('#md-pagination').empty();

                var $prev = $('<li>').append($('<a href="#">&laquo;</a>'));
                if (state.page <= 1) { $prev.addClass('disabled'); }
                $prev.on('click', function (e) { e.preventDefault(); if (state.page > 1) { loadTable(state.page - 1); } });
                $pagination.append($prev);

                for (var i = 1; i <= state.totalPages; i++) {
                    var $li = $('<li>').append($('<a href="#">' + i + '</a>'));
                    if (i === state.page) { $li.addClass('active'); }
                    $li.on('click', (function (page) {
                        return function (e) { e.preventDefault(); loadTable(page); };
                    })(i));
                    $pagination.append($li);
                }

                var $next = $('<li>').append($('<a href="#">&raquo;</a>'));
                if (state.page >= state.totalPages) { $next.addClass('disabled'); }
                $next.on('click', function (e) { e.preventDefault(); if (state.page < state.totalPages) { loadTable(state.page + 1); } });
                $pagination.append($next);
            }

            function loadTable(page) {
                state.page = page || 1;

                apiRequest('GET', API_RESOURCE + '?page[number]=' + state.page + '&page[size]=' + PAGE_SIZE)
                    .then(function (result) {
                        if (!result.ok) {
                            $('#md-table-body').html('<tr><td colspan="5">Gagal memuat data.</td></tr>');

                            return;
                        }

                        renderRows(result.data.data);
                        renderPagination(result.data.meta ? result.data.meta.total : result.data.data.length);
                        $('#md-table').trigger('footable_initialize');
                    });
            }

            function editRow(id) {
                apiRequest('GET', API_RESOURCE + '/' + id).then(function (result) {
                    if (!result.ok) { return; }

                    var attrs = result.data.data.attributes;

                    state.editingId = id;
                    $('#md-id').val(id);
                    $('#md-code').val(attrs.code);
                    $('#md-name').val(attrs.name);
                    $('#md-is-active').prop('checked', !!attrs.is_active);

                    $('#md-form-title').text('Edit Country #' + id);
                    $('#md-submit').text('Update');
                    $('#md-cancel').show();
                    hideFormError();
                });
            }

            function toggleActive(id, action) {
                apiRequest('POST', API_RESOURCE + '/' + id + '/' + action).then(function (result) {
                    if (result.ok) {
                        loadTable(state.page);
                    }
                });
            }

            function formatErrors(errors) {
                return (errors || []).map(function (error) {
                    return error.detail || error.title;
                }).join(' ');
            }

            $('#md-cancel').on('click', resetForm);

            $('#md-form').on('submit', function (e) {
                e.preventDefault();
                hideFormError();

                var attributes = {
                    code: $('#md-code').val(),
                    name: $('#md-name').val(),
                    is_active: $('#md-is-active').is(':checked'),
                };

                var isEditing = !!state.editingId;
                var url = API_RESOURCE;
                var method = 'POST';

                if (isEditing) {
                    url += '/' + state.editingId;
                    method = 'PATCH';
                }

                apiRequest(method, url, { data: { type: 'countries', attributes: attributes } })
                    .then(function (result) {
                        if (result.ok) {
                            resetForm();
                            loadTable(state.page);

                            return;
                        }

                        var errors = result.data && result.data.errors;
                        showFormError(errors ? formatErrors(errors) : 'Gagal menyimpan data.');
                    });
            });

            resetForm();
            loadTable(1);
        })(jQuery);
    </script>
@endpush
