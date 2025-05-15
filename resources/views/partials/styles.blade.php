
{{-- Jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

<!-- Icons Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

{{-- Sweetalert2 --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css">

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
  .preview-img {
    width: 200px;
    height: 200px;
    object-fit: contain;
    border: 1px solid #ddd; /* opcional: un borde ligero */
    border-radius: 4px;      /* opcional: esquinas redondeadas */
  }
.transition-all:hover {
    transform: translateY(-2px);
}

.btn-outline-danger:hover {
    background-color: #dc3545;
    color: white !important;
    box-shadow: 0 4px 6px rgba(220, 53, 69, 0.1);
}

.shadow-sm {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}
.transition-all {
    transition: all 0.3s ease;
}

.btn-outline-secondary:hover {
    background-color: #f8f9fa;
}

.btn-success {
    background-color: #10b981;
    border-color: #10b981;
}

.btn-success:hover {
    background-color: #0d9f6e;
    border-color: #0d9f6e;
}

.form-control:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
}

.input-group:focus-within {
    box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
    border-radius: 8px;
}


.text-gradient {
    background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12) !important;
}

.table th {
    border-top: none;
}

.table td, .table th {
    vertical-align: middle;
}

.btn-outline-primary:hover {
    background-color: rgba(13, 110, 253, 0.05);
}



</style>


