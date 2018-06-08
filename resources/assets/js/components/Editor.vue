<template>
  <div>
    <div id="editor-preload" class="d-none">
      <slot>
        <p>Insert an app description</p>
      </slot>
    </div>
    <div id="toolbar-container" class="bg-dark btn-toolbar p-2" role="toolbar" aria-label="Toolbar with button groups">

      <div class="btn-group mr-3 mb-1" role="group" aria-label="First group">
          <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span title="font size" id="current-size" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
              Normal
            </span>
          </button>

          <div class="dropdown-menu">
            <button type="button" class="dropdown-item button-size ql-size-small" data-size="small">Small</button>
            <button type="button" class="dropdown-item button-size" data-size="normal">Normal</button>
            <button type="button" class="dropdown-item button-size ql-size-large" data-size="large">Large</button>
            <button type="button" class="dropdown-item button-size ql-size-huge" data-size="huge">Huge</button>
          </div>
      </div>

        <div class="btn-group mr-3 mb-1" role="group" aria-label="First group">
          <button type="button" class="button-format btn btn-dark btn-sm py-2 px-3" data-format="bold" title="bold" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-bold"></i>
          </button>
          <button type="button" class="button-format btn btn-dark btn-sm py-2 px-3" data-format="italic" title="italic" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-italic"></i>
          </button>
          <button type="button" class="button-format btn btn-dark btn-sm py-2 px-3" data-format="underline" title="underline" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-underline"></i>
          </button>
          <button type="button" class="button-format btn btn-dark btn-sm py-2 px-3" data-format="strike" title="strikethrough" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-strikethrough"></i>
          </button>
        </div>

        <div class="btn-group mr-3 mb-1" role="group" aria-label="First group">
          <button type="button" class="button-heading btn btn-dark btn-sm py-2 px-3" data-size="1" title="huge heading" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-h1"></i>
          </button>
          <button type="button" class="button-heading btn btn-dark btn-sm py-2 px-3" data-size="2" title="large heading" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-h2"></i>
          </button>
          <button type="button" class="button-format btn btn-dark btn-sm py-2 px-3" data-format="blockquote" title="quote" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-quote-right"></i>
          </button>
        </div>

        <div class="btn-group mr-3 mb-1" role="group" aria-label="First group">
          <button type="button" class="button-list btn btn-dark btn-sm py-2 px-3" data-format="unordered" title="bulleted list" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-list-ul"></i>
          </button>
          <button type="button" class="button-list btn btn-dark btn-sm py-2 px-3" data-format="ordered" title="numbered list" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-list-ol"></i>
          </button>
          <button type="button" class="button-indent btn btn-dark btn-sm py-2 px-3" data-format="+1" title="indent" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-indent"></i>
          </button>
          <button type="button" class="button-indent btn btn-dark btn-sm py-2 px-3" data-format="-1" title="indent" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-outdent"></i>
          </button>
        </div>

        <div class="btn-group mr-3 mb-1" role="group" aria-label="First group">
          <button type="button" class="btn btn-dark btn-sm py-2 px-3" id="embed-button" title="embed code" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-code"></i>
          </button>
          <button type="button" class="btn btn-dark btn-sm py-2 px-3" id="image-button" title="insert image" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-image"></i>
          </button>
          <button type="button" class="btn btn-dark btn-sm py-2 px-3" id="link-button" title="insert link" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-link"></i>
          </button>
          <button type="button" class="btn btn-dark btn-sm py-2 px-3" id="video-button" title="insert video" data-toggle="tooltip" data-placement="bottom" data-delay='{ "show": 1000, "hide": 100 }'>
            <i class="fas fa-video"></i>
          </button>
        </div>
    </div>

    <div id="app-description" class="bg-dark"></div>

    <div id="editor-modal" class="modal fade text-dark" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{modal.title}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row" v-for="(input, index) in modal.inputs">
                <label for="text" class="col-sm-4 col-form-label text-md-right">{{input.label}}</label>

                <div class="col-md-6">
                    <input type="text" class="form-control editor-input" autofocus v-model="input.value">
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="promptClose(true)">Save</button>
            <button type="button" class="btn btn-secondary" @click="promptClose(false)">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    import Quill from "quill"
    let Inline = Quill.import('blots/inline');
    let Block = Quill.import('blots/block');
    let Embed = Quill.import('blots/block/embed');

    class VideoBlot extends Embed {
      static create(url) {
        let node = super.create();
        let embed = document.createElement('div');
        let wrapper = document.createElement('div');
        let iframe = document.createElement('iframe');
        if (url.includes('youtube.com')) {
          let params = paramsToJson(url);
          url = 'https://www.youtube.com/embed/' + params.v
        }
        else if (url.includes('youtu.be')) {
          let id = url.split('/').reverse()[0];
          url = "https://www.youtube.com/embed/" + id
        }
        else if (url.includes('vimeo.com')) {
          let id = url.split('/').reverse()[0];
          url = "https://player.vimeo.com/video/" + id
        }
        else if (url.includes('twitch.tv')) {
          let channel = url.split('/').reverse()[0];
          url = "https://player.twitch.tv/?channel=" + channel
        }
        embed.setAttribute('class', 'embed-content')
        wrapper.setAttribute('class', 'responsive-video')
        iframe.setAttribute('class', 'video')
        iframe.setAttribute('width', 560);
        iframe.setAttribute('height', 315);
        iframe.setAttribute('src', url);
        iframe.setAttribute('frameborder', 0);
        iframe.setAttribute('allow', 'autoplay;encrypted-media');
        iframe.setAttribute('allowfullscreen', true);
        wrapper.appendChild(iframe);
        embed.appendChild(wrapper)
        node.appendChild(embed);
        node.setAttribute('class', 'embeded')
        return node;
      }

      static value(node) {
        return {
          src: node.getAttribute('src'),
          width: node.getAttribute('width'),
          height: node.getAttribute('height')
        }
      }
    }
    VideoBlot.blotName = 'video';
    VideoBlot.tagName = 'div';

    class EmbedBlot extends Embed {
      static create(value) {
        let i = nodeFromString(value);
        let node = super.create();
        node.innerHTML = i.innerHTML;
        node.setAttribute('class', 'embeded')
        return node;
      }
    }
    EmbedBlot.blotName = 'embed';
    EmbedBlot.tagName = 'div';

    class ImageBlot extends Embed {
      static create(value) {
        let node = super.create();
        node.setAttribute('class', 'img-fluid mb-5')
        node.setAttribute('src', value.url.value)
        node.setAttribute('alt', value.alt.value)
        return node;
      }
    }
    ImageBlot.blotName = 'image';
    ImageBlot.tagName = 'img';

    class LinkBlot extends Inline {
      static create(data) {
        let node = super.create();
        console.log(data);
        node.setAttribute('target', '_blank')
        node.setAttribute('href', data.url.value)
        node.innerHTML = data.text.value
        return node;
      }
    }
    LinkBlot.blotName = 'link';
    LinkBlot.tagName = 'a';

    Quill.register(VideoBlot);
    Quill.register(EmbedBlot);
    Quill.register(ImageBlot);
    Quill.register(LinkBlot);

    export default {
        data () {
          return {
            quill: {},
            modal: {
              title: '',
              inputs: {},
              saved: false,
            }
          }
        },
        methods: {
          embed (type, data) {
            let range = this.quill.getSelection(true);
            this.quill.insertText(range.index, '\n', Quill.sources.USER);
            this.quill.insertEmbed(range.index + 1, type, data, Quill.sources.USER);
            this.quill.setSelection(range.index + 2, Quill.sources.SILENT);
          },
          getSelection() {
            var range = this.quill.getSelection();
            if (range) {
              if (range.length > 0) {
                return {
                  value: this.quill.getText(range.index, range.length),
                  index: range.index,
                  length: range.length
                }

              }
            }
            return {
              value: '',
            }
          },
          promptClose (value) {
            this.modal.saved = value;
            $('#editor-modal').modal('hide');
            if (value) this.modal.onSave(this.modal.inputs);
          },
          prompt (title, inputs) {
            this.modal.title = title;
            this.modal.inputs = inputs;
            $('#editor-modal').modal('show')
            $('.editor-input').first().focus()
            return this;
          },
          onSave (func) {
            this.modal.onSave = func
          }
        },
        mounted() {
            this.quill = new Quill('#app-description', {
              modules: {
                toolbar: '#toolbar-container'
              },
            });

            this.quill.root.innerHTML = $('#editor-preload').html()

            $('.button-format').click((e) => {
              let format = $(e.currentTarget).data('format');
              this.quill.format(format, true);
            });
            $('.button-list').click((e) => {
              let format = $(e.currentTarget).data('format');
              this.quill.format('list', format);
            });
            $('.button-indent').click((e) => {
              let format = $(e.currentTarget).data('format');
              console.log(format.toString(), typeof format.toString());
              this.quill.format('indent', format.toString());
            });
            $('.button-size').click((e) => {
              let size = $(e.currentTarget).data('size');
              this.quill.format('size', size);
            });
            $('.button-heading').click((e) => {
              let size = $(e.currentTarget).data('size');
              this.quill.format('header', parseInt(size));
            });
            $('#video-button').click(() => {
              this.prompt('Insert a video url', {
                url: {label: "Video source", value:''}
              }).onSave(data => {
                if (!data.url.value) return
                this.embed('video', data.url.value)
              });
            });
            $('#image-button').click(() => {
              this.prompt('Insert a image url', {
                url: {label: "Image url", value:''},
                alt: {label: "Alternative text", value:''}
              }).onSave(data => {
                if (!data.url.value) return
                this.embed('image', data)
              });
            });
            $('#embed-button').click(() => {
              this.prompt('Insert embed code', {
                embed: {label: "Embed code", value:''}
              }).onSave(data => {
                if (!data.embed.value) return
                this.embed('embed', data.embed.value)
              });
            });
            $('#link-button').click(() => {
              let s = this.getSelection()
              this.prompt('Insert link', {
                url: {label: "link", value:''},
                text: {label: "text", value: s.value}
              }).onSave(data => {
                if (!data.url.value) return
                data.text.value = data.text.value || data.url.value
                this.quill.format('link', data)
                if (s.value) {
                  this.quill.deleteText(s.index + data.text.value.length, s.length)
                  // this.quill.setSelection(s.index, data.text.value.length)
                }

              });
            });

            $('#app-description-value').val(this.quill.root.innerHTML);

            this.quill.on('text-change', (delta, oldDelta, source) => {
              $('#app-description-value').val(this.quill.root.innerHTML);
            });
        }
    }
</script>

<style lang="css" scoped>
  .ql-size-small {
    font-size: 0.75em;
  }
  .ql-size-large {
    font-size: 1.2em;
  }
  .ql-size-huge {
    font-size: 1.7em;
  }
  blockquote {
    padding: 2rem 1rem !important;
    margin: 1rem 0 !important;
  }
  .btn-group button:not(.dropdown-item) {border: 1px solid #2d2d2d}

  #toolbar-container, #app-description {border: 1px solid #ccc}
  #app-description {margin-top: -1px; padding: 1rem 1rem 0;}
</style>
