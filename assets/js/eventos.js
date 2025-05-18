const form = document.getElementById('formEvento');
    const lista = document.getElementById('listaEventos');

    let eventos = JSON.parse(localStorage.getItem('eventos')) || [];

    function salvarEventos() {
      localStorage.setItem('eventos', JSON.stringify(eventos));
    }

    function renderizarEventos() {
      lista.innerHTML = '';
      eventos.forEach((evento, index) => {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';

        const nome = document.createElement('span');
        nome.textContent = evento.nome;

        const tag = document.createElement('span');
        tag.className = `tag ${evento.status}`;
        tag.textContent = evento.status === 'success' ? 'Confirmado' : 'Pendente';

        const toggleBtn = document.createElement('button');
        toggleBtn.className = 'btn btn-sm btn-outline-secondary ms-2';
        toggleBtn.textContent = 'Alternar Status';
        toggleBtn.onclick = function() {
          eventos[index].status = eventos[index].status === 'success' ? 'warning' : 'success';
          salvarEventos();
          renderizarEventos();
        };

        const deleteBtn = document.createElement('button');
        deleteBtn.className = 'btn btn-sm btn-delete ms-2';
        deleteBtn.innerHTML = '<i class="fas fa-trash"></i>';
        deleteBtn.onclick = function() {
          eventos.splice(index, 1);
          salvarEventos();
          renderizarEventos();
        };

        const controls = document.createElement('div');
        controls.appendChild(tag);
        controls.appendChild(toggleBtn);
        controls.appendChild(deleteBtn);

        li.appendChild(nome);
        li.appendChild(controls);
        lista.appendChild(li);
      });
    }

    form.addEventListener('submit', function(e) {
      e.preventDefault();
      const nome = document.getElementById('nomeEvento').value;
      const status = document.getElementById('statusEvento').value;
      eventos.push({ nome, status });
      salvarEventos();
      renderizarEventos();
      form.reset();
    });

    renderizarEventos();